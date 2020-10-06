<?php

namespace App\Util;

class SpamChecker
{
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