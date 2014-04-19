<?php
session_start();

include_once '../Models/Admin.php';
$Admin = new Admin;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Myblog</title>
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
<body>

<?php include_once './inc/body_top.php'; ?>


<?php
if ( $Admin->isLogined() == true ){
    ?>
    <div id="kategoriEkle">
        <div>
            <a href="kategori_ekle.php">Kategori Ekle</a>
        </div>
    </div>
    <div id="yayınEkle">
        <div>
            <a href="yayın_ekle.php">Yayın Ekle</a>
        </div>
    </div>
    <br>
    Toplam Kategori Sayısı:
    <br>
    Toplam Yayın Sayısı:
    <br>
    Toplam Yorum Sayısı:

<?php
}