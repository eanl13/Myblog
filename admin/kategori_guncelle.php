<?php

session_start();
include_once  '../models/Admin.php';
$Admin = new Admin();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: login.php ');
    exit;
}

//form gönderildi mi?
if ( isset($_POST['btnSave']) ){
    include_once  '../models/Kategori.php';
    $Kategori= new Kategori();

    $result = $Kategori->update( $_GET['id'], $_POST['isim'] );

    if ($result == true){
        $message = 'update ok.';
    }else{
        $message = 'uptdate not ok.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<?php include_once './inc/body_top.php'; ?>

<div id="container">
    <div id="content">
        <h1>Kategori Guncelle</h1>
        <div>
            <form method="POST" >
                <div>
                    <?php
                    //form gönderilmişse mesajı yazdır
                    if ( isset($_POST['btnSave']) ){
                        echo $message;
                    }
                    ?>
                </div>
                Kategori Adı:
                <br><input type="text" name="isim" value="" />


                <br>
                <input type="submit" value="Guncelle" name="btnSave" />
            </form>
        </div>
    </div>


</div>
</body>
</html>