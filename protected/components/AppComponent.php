<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coba
 *
 * @author TIA.WICAKSONO
 */
class AppComponent extends CApplicationComponent {

    //put your code here
    public $deviceType;

    public function detectMobile() {
        $detect = Yii::app()->mobileDetect;
        $this->deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

        if ($this->deviceType == 'computer') {
            return $this->deviceType;
        } elseif ($this->deviceType == 'phone') {
            return $this->deviceType;
        } elseif ($this->deviceType == 'tablet') {
            return $this->deviceType;
        }
    }

    public function urlJs() {
        return Yii::app()->baseUrl . "/js";
    }

    public function urlCss() {
        return Yii::app()->baseUrl . "/css";
    }

    public function urlImg() {
        return Yii::app()->baseUrl . "/images";
    }

    public function konversiUang($bilangan) {
        $angka = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0',
            '0', '0', '0', '0', '0', '0');
        $kata = array('', 'satu', 'dua', 'tiga', 'empat', 'lima',
            'enam', 'tujuh', 'delapan', 'sembilan');
        $tingkat = array('', 'ribu', 'juta', 'milyar', 'triliun');

        $panjang_bilangan = strlen($bilangan);

        /* pengujian panjang bilangan */
        if ($panjang_bilangan > 15) {
            $kalimat = "Diluar Batas";
            return $kalimat;
        }

        /* mengambil angka-angka yang ada dalam bilangan,
          dimasukkan ke dalam array */
        for ($i = 1; $i <= $panjang_bilangan; $i++) {
            $angka[$i] = substr($bilangan, -($i), 1);
        }

        $i = 1;
        $j = 0;
        $kalimat = "";


        /* mulai proses iterasi terhadap array angka */
        while ($i <= $panjang_bilangan) {

            $subkalimat = "";
            $kata1 = "";
            $kata2 = "";
            $kata3 = "";

            /* untuk ratusan */
            if ($angka[$i + 2] != "0") {
                if ($angka[$i + 2] == "1") {
                    $kata1 = "seratus";
                } else {
                    $kata1 = $kata[$angka[$i + 2]] . " ratus";
                }
            }

            /* untuk puluhan atau belasan */
            if ($angka[$i + 1] != "0") {
                if ($angka[$i + 1] == "1") {
                    if ($angka[$i] == "0") {
                        $kata2 = "sepuluh";
                    } elseif ($angka[$i] == "1") {
                        $kata2 = "sebelas";
                    } else {
                        $kata2 = $kata[$angka[$i]] . " belas";
                    }
                } else {
                    $kata2 = $kata[$angka[$i + 1]] . " puluh";
                }
            }

            /* untuk satuan */
            if ($angka[$i] != "0") {
                if ($angka[$i + 1] != "1") {
                    $kata3 = $kata[$angka[$i]];
                }
            }

            /* pengujian angka apakah tidak nol semua,
              lalu ditambahkan tingkat */
            if (($angka[$i] != "0") OR ( $angka[$i + 1] != "0") OR ( $angka[$i + 2] != "0")) {
                $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
            }

            /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
              ke variabel kalimat */
            $kalimat = $subkalimat . $kalimat;
            $i = $i + 3;
            $j = $j + 1;
        }

        /* mengganti satu ribu jadi seribu jika diperlukan */
        if (($angka[5] == "0") AND ( $angka[6] == "0")) {
            $kalimat = str_replace("satu ribu", "seribu", $kalimat);
        }

        return trim($kalimat);
    }

}
