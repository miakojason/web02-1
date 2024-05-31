<?php include_once "./db.php";
$newsid = $News->find($_POST['news']);
$_POST['acc']=$_SESSION['user'];
//先做log增刪
//news案讚收讚
// if ($Log->count(['acc' => $_SESSION['user'], 'news' => $_POST['news']]) > 0) {
    // $Log->del(['acc' => $_SESSION['user'], 'news' => $_POST['news']]);
if ($Log->count($_POST) > 0) {
    $Log->del($_POST);
    $newsid['good']--;
    $News->save($newsid);
} else {
    // $Log->save(['acc' => $_SESSION['user'], 'news' => $_POST['news']]);
    $Log->save($_POST);
    $newsid['good']++;
    $News->save($newsid);
}
