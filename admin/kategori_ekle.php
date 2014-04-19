<?php
session_start();

include_once '../Models/Admin.php';
$Admin = new Admin;

if ( $Admin->isLogined() == false ){
    header('Location: '. '.index.php?ref='.'./kategori_ekle.php');
    exit;
}

if ( isset($_POST['btnSave']) ){
    include_once '../models/Kategori.php';
    $Kategori = new Kategori();

    $result = $Kategori->kategoriEkle( $_POST['name'] );
    //eğer haber kayıt edilmişse
    if ($result == true){
        $message = 'Kategori başarıyla eklenmiştir.';
    }else{
        $message = 'Kategori eklenirken hata oluştu.';
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
        <h1>Kategori Ekle</h1>
        <div>
            <form method="POST" enctype="multipart/form-data">
                <div>
                    <?php
                    if ( isset($_POST['btnSave']) ){
                        echo $message;
                    }
                    ?>
                </div>
                ISIM:
                <br><input type="text" name="name" value="" />
                <br>
                <br>

                <br>
                <input type="submit" value="Save" name="btnSave" />
            </form>
        </div>
    </div>

    <div id="submenu">
        <ul>
            <li><a href="kategori_liste.php">Kategori List</a></li>
            <li><a href="kategori_ekle.php">Kategori Ekle</a></li>
        </ul>
    </div>
</div>
</body>
</html>