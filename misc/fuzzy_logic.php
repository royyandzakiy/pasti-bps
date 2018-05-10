<?php
// input
$Durasi = $_GET['durasi'];
$JB = $_GET['jb'];
$Nilai = $_GET['nilai'];

// output
$TP = 0;

// misc
$DurasiPendek; $DurasiSedang; $DurasiPanjang;
$JBSedikit; $JBSedang; $JBBanyak;
$NilaiKecil; $NilaiCukup; $NilaiBesar;
$rule1 = 999; $rule2 = 999; $rule3 = 999; $rule4 = 999; $rule5 = 999; $rule6 = 999; $rule7 = 999; $rule8 = 999; $rule9 = 999; 
$rule10 = 999; $rule11 = 999; $rule12 = 999; $rule13 = 999; $rule14 = 999; $rule15 = 999; $rule16 = 999; $rule17 = 999; $rule18 = 999; 
$rule19 = 999; $rule20 = 999; $rule21 = 999; $rule22 = 999; $rule23 = 999; $rule24 = 999; $rule25 = 999; $rule26 = 999; $rule27 = 999; 
$maximal; $Deskripsi;
$x1; $x2; $x3; $x4; $x5; $x6; $x7; $x8; $x9; $x10; $x11; $x12; $x13; $x14; $x15; $x16; $x17; $x18; $x19; $x20; $x21; $x22; $x23; $x24; $x25; $x26; $x27;


function FuzzyDurasi() {
    global $Durasi, $Nilai, $JB;
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    If ($Durasi == "") {
        $Durasi = 0;
    }

    If ($Durasi >= 0 && $Durasi <= 10) {
        If ($Durasi >= 0 && $Durasi < 8) {
            $DurasiPendek = 1;
        } Else If ($Durasi >= 8 && $Durasi <= 10) {
            $DurasiPendek = (10 - $Durasi) / 2;
        }
    } Else {
        $DurasiPendek = 0;
    }

    If ($Durasi >= 8 && $Durasi <= 22) {
        If ($Durasi >= 8 && $Durasi <= 10) {
            $DurasiSedang = ($Durasi - 8) / 2;
        } Else If ($Durasi > 10 && $Durasi < 20) {
            $DurasiSedang = 1;
        } Else If ($Durasi >= 20 && $Durasi <= 22) {
            $DurasiSedang = (22 - $Durasi) / 2;
        }
    } Else {
        $DurasiSedang = 0;
    }

    If ($Durasi >= 20 && $Durasi <= 30) {
        If ($Durasi >= 20 && $Durasi <= 22) {
            $DurasiPanjang = ($Durasi - 20) / 2;
        } Else If ($Durasi > 22 && $Durasi <= 30) {
            $DurasiPanjang = 1;
        }
    } Else {
        $DurasiPanjang = 0;
    }
}

function FuzzyJB() {
    global $Durasi, $Nilai, $JB;
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    If ($JB == "") {
        $JB = 0;
    }

    If ($JB >= 0 && $JB <= 8) {
        $JBSedikit = (8 - $JB) / 8;
    } Else {
        $JBSedikit = 0;
    }

    If ($JB >= 7 && $JB <= 13) {
        If ($JB >= 7 && $JB <= 9) {
            $JBSedang = ($JB - 7) / 2;
        } Else If ($JB > 9 && $JB < 11) {
            $JBSedang = 1;
        } Else If ($JB >= 11 && $JB <= 13) {
            $JBSedang = (13 - $JB) / 2;
        }
    } Else {
        $JBSedang = 0;
    }

    If ($JB >= 12 && $JB <= 20) {
        $JBBanyak = ($JB - 12) / 8;
    } Else {
        $JBBanyak = 0;
    }
}

function FuzzyNilai() {
    global $Durasi, $Nilai, $JB;
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    If ($Nilai == "") {
        $Nilai = 0;
    }

    If ($Nilai >= 0 && $Nilai <= 40) {
        $NilaiKecil = (40 - $Nilai) / 40;
    } Else {
        $NilaiKecil = 0;
    }

    If ($Nilai >= 35 && $Nilai <= 65) {
        If ($Nilai >= 35 && $Nilai <= 45) {
            $NilaiCukup = ($Nilai - 35) / 10;
        } Else If ($Nilai > 45 && $Nilai < 60) {
            $NilaiCukup = 1;
        } Else If ($Nilai >= 55 && $Nilai <= 65) {
            $NilaiCukup = (65 - $Nilai) / 10;
        }
    } Else {
        $NilaiCukup = 0;
    }

    If ($Nilai >= 60 && $Nilai <= 100) {
        $NilaiBesar = ($Nilai - 60) / 40;
    } Else {
        $NilaiBesar = 0;
    }
}

function CariNilaiMax() {
    global $Durasi, $Nilai, $JB;
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $maximal, $TP, $Deskripsi;
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals1 = array($rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9, $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18, $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule2);

    $maximal = 0;
    foreach ($vals1 as $element) {
        $maximal = Max($maximal, $element);
    }

    If ($maximal == $rule1) {
        $TP = $x1 / 2;
    } Else If ($maximal == $rule2) {
        $TP = $x2;
    } Else If ($maximal == $rule3) {
        $TP = $x3;
    } Else If ($maximal == $rule4) {
        $TP = $x4 / 2;
    } Else If ($maximal == $rule5) {
        $TP = $x5;
    } Else If ($maximal == $rule6) {
        $TP = $x6;
    } Else If ($maximal == $rule7) {
        $TP = $x7;
    } Else If ($maximal == $rule8) {
        $TP = ($x8 + 100) / 2;
    } Else If ($maximal == $rule9) {
        $TP = ($x9 + 100) / 2;
    } Else If ($maximal == $rule10) {
        $TP = $x10 / 2;

    } Else If ($maximal == $rule11) {
        $TP = $x11;
    } Else If ($maximal == $rule12) {
        $TP = $x12;
    } Else If ($maximal == $rule13) {
        $TP = $x13 / 2;
    } Else If ($maximal == $rule14) {
        $TP = $x14;
    } Else If ($maximal == $rule15) {
        $TP = $x15;
    } Else If ($maximal == $rule16) {
        $TP = $x16;
    } Else If ($maximal == $rule17) {
        $TP = ($x17 + 100) / 2;
    } Else If ($maximal == $rule18) {
        $TP = ($x18 + 100) / 2;
    } Else If ($maximal == $rule19) {
        $TP = $x19 / 2;
    } Else If ($maximal == $rule20) {
        $TP = $x20 / 2;

    } Else If ($maximal == $rule21) {
        $TP = $x21;
    } Else If ($maximal == $rule22) {
        $TP = $x22 / 2;
    } Else If ($maximal == $rule23) {
        $TP = $x23;
    } Else If ($maximal == $rule24) {
        $TP = $x24;
    } Else If ($maximal == $rule25) {
        $TP = $x25;
    } Else If ($maximal == $rule26) {
        $TP = $x26;
    } Else If ($maximal == $rule27) {
        $TP = ($x27 + 100) / 2;
    }

    If ($TP < 50) {
        $Deskripsi = "Kurang";
    } Else If ($TP == 50) {
        $Deskripsi = "Cukup";
    } Else If ($TP > 50) {
        $Deskripsi = "Baik";
    }

}

function R1() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBSedikit, $NilaiKecil);

    foreach ($vals as $element) {
        $rule1 = Min($rule1, $element);
    }

    $x1 = 75 - ($rule1 * 75);
}

function R2() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBSedikit, $NilaiCukup);

    foreach ($vals as $element) {
        $rule2 = Min($rule2, $element);
    }

    $x2 = 75 - ($rule2 * 75);
}

function R3() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBSedikit, $NilaiBesar);

    foreach ($vals as $element) {
        $rule3 = Min($rule3, $element);
    }

    $x3 = ((25 + ($rule3 * 25)) + (75 - ($rule3 * 25))) / 2;
}

function R4() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBSedang, $NilaiKecil);

    foreach ($vals as $element) {
        $rule4 = Min($rule4, $element);
    }

    $x4 = 75 - ($rule4 * 75);
}

function R5() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBSedang, $NilaiCukup);

    foreach ($vals as $element) {
        $rule5 = Min($rule5, $element);
    }

    $x5 = ((25 + ($rule5 * 25)) + (75 - ($rule5 * 25))) / 2;
}

function R6() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBSedang, $NilaiBesar);

    foreach ($vals as $element) {
        $rule6 = Min($rule6, $element);
    }

    $x6 = 25 + ($rule6 * 75);
}

function R7() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBBanyak, $NilaiKecil);

    foreach ($vals as $element) {
        $rule7 = Min($rule7, $element);
    }

    $x7 = ((25 + ($rule7 * 25)) + (75 - ($rule7 * 25))) / 2;
}

function R8() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBBanyak, $NilaiCukup);

    foreach ($vals as $element) {
        $rule8 = Min($rule8, $element);
    }

    $x8 = ((25 + ($rule8 * 25)) + (75 - ($rule8 * 25))) / 2;
}

function R9() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPendek, $JBBanyak, $NilaiBesar);

    foreach ($vals as $element) {
        $rule9 = Min($rule9, $element);
    }

    $x9 = 25 + ($rule9 * 75);
}

function R10() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBSedikit, $NilaiKecil);

    foreach ($vals as $element) {
        $rule10 = Min($rule10, $element);
    }

    $x10 = 75 - ($rule10 * 75);
}

function R11() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBSedikit, $NilaiCukup);

    foreach ($vals as $element) {
        $rule11 = Min($rule11, $element);
    }

    $x11 = 75 - ($rule11 * 75);
}

function R12() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBSedikit, $NilaiBesar);

    foreach ($vals as $element) {
        $rule12 = Min($rule12, $element);
    }

    $x12 = ((25 + ($rule12 * 25)) + (75 - ($rule12 * 25))) / 2;
}

function R13() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBSedang, $NilaiKecil);

    foreach ($vals as $element) {
        $rule13 = Min($rule13, $element);
    }

    $x13 = 75 - ($rule13 * 75);
}

function R14() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBSedang, $NilaiCukup);

    foreach ($vals as $element) {
        $rule14 = Min($rule14, $element);
    }

    $x14 = ((25 + ($rule14 * 25)) + (75 - ($rule14 * 25))) / 2;
}

function R15() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBSedang, $NilaiBesar);

    foreach ($vals as $element) {
        $rule15 = Min($rule15, $element);
    }

    $x15 = 25.0 + ($rule15 * 75.0);
}

function R16() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBBanyak, $NilaiKecil);

    foreach ($vals as $element) {
        $rule16 = Min($rule16, $element);
    }

    $x16 = ((25 + ($rule16 * 25)) + (75 - ($rule16 * 25))) / 2;
}

function R17() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBBanyak, $NilaiCukup);

    foreach ($vals as $element) {
        $rule17 = Min($rule17, $element);
    }

    $x17 = ((25 + ($rule17 * 25)) + (75 - ($rule17 * 25))) / 2;
}

function R18() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiSedang, $JBBanyak, $NilaiBesar);

    foreach ($vals as $element) {
        $rule18 = Min($rule18, $element);
    }

    $x18 = 25 + ($rule18 * 75);
}

function R19() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBSedikit, $NilaiKecil);

    foreach ($vals as $element) {
        $rule19 = Min($rule19, $element);
    }

    $x19 = 75 - ($rule19 * 75);
}

function R20() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBSedikit, $NilaiCukup);

    foreach ($vals as $element) {
        $rule20 = Min($rule20, $element);
    }

    $x20 = 75 - ($rule20 * 75);
}

function R21() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBSedikit, $NilaiBesar);

    foreach ($vals as $element) {
        $rule21 = Min($rule21, $element);
    }

    $x21 = ((25 + ($rule21 * 25)) + (75 - ($rule21 * 25))) / 2;
}

function R22() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBSedang, $NilaiKecil);

    foreach ($vals as $element) {
        $rule22 = Min($rule22, $element);
    }

    $x22 = 75 - ($rule22 * 75);
}

function R23() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBSedang, $NilaiCukup);

    foreach ($vals as $element) {
        $rule23 = Min($rule23, $element);
    }

    $x23 = ((25 + ($rule23 * 25)) + (75 - ($rule23 * 25))) / 2;
}

function R24() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBSedang, $NilaiBesar);

    foreach ($vals as $element) {
        $rule24 = Min($rule24, $element);
    }

    $x24 = ((25 + ($rule24 * 25)) + (75 - ($rule24 * 25))) / 2;
}

function R25() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBBanyak, $NilaiKecil);

    foreach ($vals as $element) {
        $rule25 = Min($rule25, $element);
    }

    $x25 = ((25 + ($rule25 * 25)) + (75 - ($rule25 * 25))) / 2;
}

function R26() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBBanyak, $NilaiCukup);

    foreach ($vals as $element) {
        $rule26 = Min($rule26, $element);
    }

    $x26 = ((25 + ($rule26 * 25)) + (75 - ($rule26 * 25))) / 2;
}

function R27() {
    global $DurasiPendek, $DurasiSedang, $DurasiPanjang;
    global $JBSedikit, $JBSedang, $JBBanyak;
    global $NilaiKecil, $NilaiCukup, $NilaiBesar;
    global $rule1, $rule2, $rule3, $rule4, $rule5, $rule6, $rule7, $rule8, $rule9; 
    global $rule10, $rule11, $rule12, $rule13, $rule14, $rule15, $rule16, $rule17, $rule18; 
    global $rule19, $rule20, $rule21, $rule22, $rule23, $rule24, $rule25, $rule26, $rule27; 
    global $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10, $x11, $x12, $x13, $x14, $x15, $x16, $x17, $x18, $x19, $x20, $x21, $x22, $x23, $x24, $x25, $x26, $x27;
    $vals = array($DurasiPanjang, $JBBanyak, $NilaiBesar);

    foreach ($vals as $element) {
        $rule27 = Min($rule27, $element);
    }

    $x27 = ((25 + ($rule27 * 25)) + (75 - ($rule27 * 25))) / 2;
}

function Button1_Click() {

    FuzzyDurasi();
    FuzzyJB();
    FuzzyNilai();

    R1(); R2(); R3(); R4(); R5(); R6(); R7(); R8(); R9(); R10();
    R11(); R12(); R13(); R14(); R15(); R16(); R17(); R18(); R19(); R20();
    R21(); R22(); R23(); R24(); R25(); R26(); R27();

    CariNilaiMax();

}

Button1_Click();

echo $TP;
    /*
    echo "// INPUT:<br/>";
    echo "Durasi: " . $DurasiPendek ." - ". $DurasiSedang ." - ". $DurasiPanjang . "<br/>";
    echo "JB: " . $JBSedikit ." - ". $JBSedang ." - ". $JBBanyak. "<br/>";
    echo "Nilai: " . $NilaiKecil ." - ". $NilaiCukup ." - ". $NilaiBesar. "<br/>";
    echo "// OUTPUT: <br/>";
    echo $Durasi . "<br />";
    echo $Nilai . "<br />";
    echo $JB . "<br />";
    echo $TP . " - " . $Deskripsi . "<br />";
    echo $DurasiPendek . $DurasiSedang . $DurasiPanjang;
    echo $JBSedikit . $JBSedang . $JBBanyak;
    echo $NilaiKecil. $NilaiCukup. $NilaiBesar;
    echo $rule1. $rule2. $rule3. $rule4. $rule5. $rule6. $rule7. $rule8. $rule9; 
    echo $rule10. $rule11. $rule12. $rule13. $rule14. $rule15. $rule16. $rule17. $rule18; 
    echo $rule19. $rule20. $rule21. $rule22. $rule23. $rule24. $rule25. $rule26. $rule27; 
    echo "x: " . $x1 . " - " . $x2 . " - " . $x3 . " - " . $x4 . " - " . $x5 . " - " . $x6 . " - " . $x7 . " - " . $x8 . " - " . $x9 . " - " . $x10 . " - " . $x11 . " - " . $x12 . " - " . $x13 . " - " . $x14 . " - " . $x15 . " - " . $x16 . " - " . $x17 . " - " . $x18 . " - " . $x19 . " - " . $x20 . " - " . $x21 . " - " . $x22 . " - " . $x23 . " - " . $x24 . " - " . $x25 . " - " . $x26 . " - " . $x27;
    */
?>