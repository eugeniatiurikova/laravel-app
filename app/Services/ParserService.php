<?php

namespace App\Services;

use App\Http\Controllers\Admin\NewsController;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Services\Contract\Parser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
//    protected string $link;
//
//    public function setLink(string $link): Parser
//    {
//        $this->link = $link;
//        return $this;
//    }

    public function parse(string|null $link): array
    {
        if ($link) {
            $xml = XmlParser::load($link);
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'image' => ['uses' => 'channel.image.url'],
                'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
            ]);
            $arrName = explode('/', $link);
            $name = end($arrName) . '.json';
            $serialize = json_encode($data);
            Storage::disk('upload')->put('/parsing/' . $name,$serialize);
            return $data;
        }
        return [];
    }

    public function writeToDatabase(string $link, CategoriesQueryBuilder $builder, NewsQueryBuilder $newsBuilder): bool {
        $data = $this->parse($link);
        $category = $builder->getCategoryByTitle($data['title']);
        if(!$category) {
            $category = $builder->create([
                'title' => $data['title'],
                'description' => $data['description']
            ]);
            if (!$category->save()) {
                return false;
            }
        }
        $image = fake()->imageUrl;
        if ($data['image']) {
            $image = (substr($data['image'],0,4) === 'http') ?
                $data['image'] :
                $data['link'].$data['image'];
        }
        foreach ($data['news'] as $news) {
            if(!$newsBuilder->getNewsByTitle($news['title'])) {
                $pubDate = \DateTime::createFromFormat("ddd, dd MMM yyyy HH:mm:ss zzz",$news['pubDate']);
                $dbNews = $newsBuilder->create([
                    'title' => $news['title'],
                    'author' => Auth::user()->name,
                    'description' => $news['description'],
                    'categories' => [$category['id']],
                    'image' => $image,
                    'created_at' => $pubDate,
                    'updated_at' => now('Europe/Moscow')
                ]);
                if ($dbNews->save()) {
                    $dbNews->categories()->attach([$category['id']]);
                } else {
                    throw new \Exception('Cannot save news: '.$data['title']);
                }
            } else {
                throw new \Exception('News always exist: '.$news['title']);
            }
        }
        return true;
    }
}
