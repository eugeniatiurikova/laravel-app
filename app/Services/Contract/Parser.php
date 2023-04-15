<?php

namespace App\Services\Contract;

interface Parser
{
//    public static function setLink(string $link): Parser;
    public function parse(string $link): array;
}
