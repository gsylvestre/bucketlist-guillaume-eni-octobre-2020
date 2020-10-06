<?php

namespace App\Tests;

use App\Util\SpamChecker;
use PHPUnit\Framework\TestCase;

class SpamCheckerTest extends TestCase
{
    public function testContainsSpam()
    {
        $spamChecker = new SpamChecker();

        $result = $spamChecker->containsSpam("lorem ipsum dolor sit amet.");
        $this->assertEquals(0, $result, "containsSpam should return 0 here!");

        $result = $spamChecker->containsSpam("you should buy viagra online and some poutine");
        $this->assertEquals(2, $result, "containsSpam should return 2 here!");
    }
}
