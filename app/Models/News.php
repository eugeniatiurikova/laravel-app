<?php

namespace App\Models;

use App\Enums\News\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(array $columns = ['*']): Collection
    {
        return DB::table($this->table)
            ->join('categories_has_news as chn','news.id','=', 'chn.news_id')
            ->leftJoin('categories','chn.category_id','=','categories.id')
            ->select('news.*','categories.title as category_title')
//            ->whereIn('id', [1,7,10])
//            ->where([
//                ['title','like','%ti%'],
//                ['id','>',3]
//            ])
//            ->orWhere('status','=',StatusEnum::PUBLISHED)
            ->get($columns);
    }

    public function getNewsById(int $id, array $columns = ['*']): ?Builder
    {
        return DB::table($this->table)->find($id,$columns);
    }
}
