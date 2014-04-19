<?php
session_start();

include_once '../Models/Admin.php';
$Admin = new Admin;


$errorMessage = NULL;
if ( isset($_POST['btnLogin']) ){//form gonderilmişse

    $loginResult = $Admin->girisYap($_POST['email'], $_POST['password']);

    if ( $loginResult[0] == true ){

        header("Location: ". "./index.php");
        exit;
    }else{
        $errorMessage = $loginResult[1];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
if ( !is_null($errorMessage) ) {
    ?>
    <div>
        <?php echo $errorMessage; ?>
    </div>

<?php
}
?>

<form name="frmLogin" method="POST">
    Email : <input type="text" name="email" value="" />
    <br />
    Password : <input type="password" name="password" value="" />
    <br />
    <input type="submit" value="Login" name="btnLogin" />

</form>

</body>
</html>