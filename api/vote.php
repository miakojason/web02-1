<?php include_once "./db.php";
//先處理次選項
$opt=$Que->find($_POST['opt']);
$opt['vote']++;
$Que->save($opt);
//處理主選項
$row=$Que->find(['id'=>$opt['subject_id']]);
$row['vote']++;
$Que->save($row);
to("../index.php?do=reault&id={$row['id']}");