<?php
use PHPUnit\Framework\TestCase;

require_once "Wordcount.php";

class SimpleTest extends TestCase
{
    public function testcountWords()
    {
        $Wc = new WordCount();
        $TestSentence = "Nama saya Ilham Kurniawan kan";
        $WordCount = $Wc->countWords($TestSentence);
        $this->assertEquals(4, $WordCount);
    }
}
?>