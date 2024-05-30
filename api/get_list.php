<?php include_once "./db.php";
$rows=$News->all(['type'=>$_GET['type'],'sh'=>1]);
foreach($rows as $row){
    ?>
    <div>
        <a href="Javascript:getnews(<?=$row['id'];?>)"><?=$row['title'];?></a>
    </div>
    <?php
}
?>