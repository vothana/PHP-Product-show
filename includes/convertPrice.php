<?php
$check = str_split($price); //សម្រាបើពិនិត្រមានតម្លៃមានចុចអត់
$new = ""; //សម្រាប់ផ្ទុកតម្លៃថ្មី
$pop = NULL; //សម្រាប់ផ្ទុកលេខក្រោយ ចុច
for ($j = 0; $j < strlen($price); $j++) { //
    if ($check[$j] == ".") {
        $arr = explode(".", $price); //ផ្តាច់ដោយចុច
        $pop = array_pop($arr);
        $new = implode(':', $arr); //array ទៅជា String វិញ
        break;
    } else {
        $new = $price;
    }
}
$array = str_split($new);  //String ទៅជា Array
$array = array_reverse($array); //Reverse ដើម្បីរាប់ខ្ទង់កាត់ក្បៀសខ្ទង់ពាន់
$covertedPrice = ""; //តម្លៃសម្រេច
for ($i = 0; $i < strlen($new); $i++) {

    if ($i == 2 || $i == 5) { //រាប់ចាប់ពី 0
        if (strlen($new) == 3) {
            $covertedPrice = $covertedPrice . $array[$i];
        } else {
            $covertedPrice = $covertedPrice . $array[$i] . ",";
        }
    } else {
        $covertedPrice = ($covertedPrice . $array[$i]);
    }
}
if (strlen($new) == 6) {
    $covertedPrice = rtrim($covertedPrice, ","); //សម្រាប់កាត់លើសក្បៀស Ex: $ ,123,212
}

if ($pop == NULL) {
    $covertedPrice = strrev($covertedPrice);
} else {
    $covertedPrice = strrev($covertedPrice) . "." . $pop;
}
