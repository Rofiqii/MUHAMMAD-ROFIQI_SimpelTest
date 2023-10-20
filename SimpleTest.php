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
// Baris 1-2: Mendefinisikan namespace dan mengimport kelas TestCase dari framework PHPUnit.
// Baris 4: Mengimport kelas WordCount dari file Wordcount.php.
// Baris 6-12: Mendefinisikan kelas SimpleTest yang merupakan turunan dari kelas TestCase. Kelas ini berisi sebuah metode bernama testcountWords() yang akan menguji fungsi countWords().
// Baris 8: Membuat objek $Wc dari kelas WordCount.
// Baris 9: Membuat variabel $TestSentence yang berisi kalimat yang akan diuji.
// Baris 10: Memanggil fungsi countWords() dari objek $Wc dengan parameter $TestSentence, dan menyimpan hasilnya pada variabel $WordCount.
// Baris 11: Membandingkan nilai variabel $WordCount dengan nilai 4 menggunakan fungsi
?>