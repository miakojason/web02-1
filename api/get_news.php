<?php include_once "./db.php";
$row=$News->find($_GET['id']);
?>
<pre><h1><?=$row['title'];?></h1><?=$row['text'];?></pre>