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
        <?php
        $KategoriList = $Kategori->getKategori(10);
        ?>
        <div id="deleteResult">
            <?php
            if(isset($_GET['delete'])){
                switch ($_GET['delete']) {
                    case 'ok':
                        echo 'Delete operation successful.';
                        break;
                    case 'notok':
                        echo 'Delete operation not successful.';
                        break;
                    default:
                        break;
                }
            }
            ?>
        </div>
        <table border="1" cellpadding="2">
            <thead>
            <tr>
                <th>ID</th>
                <th>ISIM</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (is_null($KategoriList) ){
                echo '<tr><td colspan="5">No record.</td></tr>';
            }else{
                foreach ($KategoriList as $KategoriItem) {
                    $KategoriItem =(object)$KategoriItem;
                    ?>
                    <tr>
                        <td><?php echo $KategoriItem->id; ?></td>
                        <td><?php echo $KategoriItem->isim; ?></td>
                        <td>
                            <a href="kategori_sil.php?id=<?php echo $KategoriItem->id; ?>">
                                Delete
                            </a>
                            |
                            <a href="kategori_guncelle.php?id=<?php echo $KategoriItem->id; ?>">
                                Detail
                            </a>
                        </td>
                    </tr>
                <?php
                }
            }
            ?>

            </tbody>
        </table>

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