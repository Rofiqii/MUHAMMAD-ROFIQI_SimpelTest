<?php
class Wordcount{
    public function countWords($sentence){
        return count(explode(" ", $sentence));
    }
}
// Baris 1-5: Mendefinisikan kelas Wordcount dengan menggunakan kata kunci class. Kelas ini memiliki satu metode bernama countWords().
// Baris 2-4: Mendefinisikan metode countWords(). Metode ini menerima satu parameter bernama $sentence, yang merupakan kalimat yang akan dihitung jumlah katanya.
// Baris 3: Menggunakan fungsi explode() untuk memecah kalimat menjadi array kata-kata, dengan pemisah spasi.
// Baris 4: Menggunakan fungsi count() untuk menghitung jumlah elemen pada array kata-kata, yang merupakan jumlah kata pada kalimat.
?>