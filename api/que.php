<?php include_once "./db.php";
if(isset($_POST['text'])){
    $row['text']=$_POST['text'];
    $row['subject_id']=0;
    $Que->save($row);
    $id=$Que->max('id');
}
if(isset($_POST['option'])){
    foreach($_POST['option'] as $idx=>$text){
        $opt['text']=$text;
        $opt['subject_id']=$id;
        $Que->save($opt);
    }
}
to("../back.php?do=que");