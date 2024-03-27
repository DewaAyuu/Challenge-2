<?php

class Tim {
    public $nama;
    public $skor = [];

    function __construct($nama, ...$skor) {
        $this->nama = $nama;
        $this->skor = $skor;
    }

    function rataRataSkor($decimals = 2) {
        $average = array_sum($this->skor) / count($this->skor);
        return number_format($average, $decimals);
    }
}

class Hasil {
    public $tim1;
    public $tim2;

    function __construct($tim1, $tim2) {
        $this->tim1 = $tim1;
        $this->tim2 = $tim2;
    }

    function pemenang() {
        $rataRataTim1 = $this->tim1->rataRataSkor();
        $rataRataTim2 = $this->tim2->rataRataSkor();

        // Skor minimum
        $skorMinimum = 100;

        // Cek apakah kedua tim memenuhi skor minimum
        $tim1Min = $rataRataTim1 >= $skorMinimum;
        $tim2Min = $rataRataTim2 >= $skorMinimum;

        if ($tim1Min && $tim2Min) {
            if ($rataRataTim1 > $rataRataTim2) {
                return $this->tim1->nama . " Menang";
            } elseif ($rataRataTim2 > $rataRataTim1) {
                return $this->tim2->nama . " Menang";
            } else {
                return "Tim Seri";
            }
        } elseif ($tim1Min && !$tim2Min) {
            return $this->tim1->nama . " Menang";
        } elseif (!$tim1Min && $tim2Min) {
            return $this->tim2->nama . " Menang";
        } else {
            return "Tidak ada tim yang memenangkan trofi";
        }
    }

    function HTML() {
        echo $this->tim1->nama . " (" . implode(", ", $this->tim1->skor) . ") : " . $this->tim1->rataRataSkor() . "<br>";
        echo $this->tim2->nama . " (" . implode(", ", $this->tim2->skor) . ") : " . $this->tim2->rataRataSkor() . "<br>";
        echo "Hasil : " . $this->pemenang() . "<br><br>";
        echo "=============================";
    }
}

// Data 1
echo "<h3>Data 1</h3>";
$lumba = new Tim("Lumba-Lumba", 96, 108, 89);
$koala = new Tim('Koala', 88, 91, 110);
$hasil = new Hasil($lumba, $koala);
$hasil->HTML();

// Data Bonus 1
echo "<h3>Data Bonus 1</h3>";
$lumba = new Tim("Lumba-Lumba", 97, 112, 101);
$koala = new Tim('Koala', 109, 95, 123);
$hasil = new Hasil($lumba, $koala);
$hasil->HTML();

// Data Bonus 2
echo "<h3>Data Bonus 2</h3>";
$lumba = new Tim("Lumba-Lumba", 97, 112, 101);
$koala = new Tim('Koala', 109, 95, 106);
$hasil = new Hasil($lumba, $koala);
$hasil->HTML();
?>