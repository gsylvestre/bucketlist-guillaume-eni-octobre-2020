<?php

namespace App\Util;

use Doctrine\Persistence\ManagerRegistry;

class SpamChecker
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function containsSpam(string $text)
    {
        $spamWords = ["viagra", "drug", "poutine"];

        $foundWordsCount = 0;
        foreach($spamWords as $word){
            if (strstr($text, $word)){
                $foundWordsCount++;
                continue;
            }
        }

        return $foundWordsCount;
    }
}