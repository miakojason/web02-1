<?php include_once "./db.php";
// $res=$User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
$res = $User->count($_POST);
if ($res > 0) {
    $_SESSION['user'] = $_POST['acc'];
    echo 1;
} else {
    echo 0;
}
