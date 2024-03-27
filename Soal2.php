<?php

class Orang {
    public $nama;
    public $berat;
    public $tinggi;

    function __construct($nama, $berat, $tinggi) {
        $this->nama = $nama;
        $this->berat = $berat;
        $this->tinggi = $tinggi;
    }

    function hitungBMI() {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }
}

class Hasil {
    public $orang1;
    public $orang2;

    function __construct($orang1, $orang2) {
        $this->orang1 = $orang1;
        $this->orang2 = $orang2;
    }

    function HTML() {
        echo "<div>";
        echo "<h4>{$this->orang1->nama}:</h4>";
        echo "<div>Tinggi: {$this->orang1->tinggi} m</div>";
        echo "<div>Berat: {$this->orang1->berat} kg</div>";
        echo "<h4>{$this->orang2->nama}:</h4>";
        echo "<div>Tinggi: {$this->orang2->tinggi} m</div>";
        echo "<div>Berat: {$this->orang2->berat} kg</div>";

        $bmi1 = round($this->orang1->hitungBMI(), 2);
        $bmi2 = round($this->orang2->hitungBMI(), 2);

        echo "<h4>Hasil BMI</h4>";
        echo "<div>{$this->orang1->nama}: $bmi1</div>";
        echo "<div>{$this->orang2->nama}: $bmi2</div>";

        $markHigherBMI = $bmi1 > $bmi2;
        echo "<h4>{$this->orang1->nama} memiliki BMI lebih tinggi dari {$this->orang2->nama}: " . ($markHigherBMI ? 'True' : 'False') . "</h4>";
        echo "<h5>=============================</h5>";
        echo "</div>";
    }
}

echo "<h2>Data 1</h2>";
$mark = new Orang("Mark", 78, 1.69);
$john = new Orang('John', 92,1.95);
$hasil = new Hasil($mark, $john);
$hasil->HTML();

echo "<h2>Data 2</h2>";
$mark = new Orang("Mark", 95, 1.88);
$john = new Orang('John', 85, 1.76);
$hasil = new Hasil($mark, $john);
$hasil->HTML();

?>
