<?php

namespace App\Services\Contract;

use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;

interface Parser
{
//    public static function setLink(string $link): Parser;
    /**
     * @param string|null $link
     * @return array
     */
    public function parse(string|null $link): array;
    public function writeToDatabase(string $link, CategoriesQueryBuilder $builder, NewsQueryBuilder $newsBuilder): bool;
}
