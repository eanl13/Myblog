<?php
session_start();

include_once '../Models/Admin.php';
include_once '../models/Kategori.php';
$Admin = new Admin;
$Kategori = new Kategori();

if ( $Admin->isLogined() == false ){
    header('Location: '. '.index.php?ref='.'./kategori_ekle.php');
    exit;
}

if( isset($_GET['id']) ){
    $delete_result = $Kategori->delete($_GET['id']);
    if( $delete_result == true ){
        header('Location:' . './kategori_liste.php?delete=ok');
        exit;
    }else{
        header('Location:' .  './kategori_liste.php?delete=notok');
        exit;
    }
}

header('Location:' .  './kategori_liste.php');
exit;