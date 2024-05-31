<?php $title = $Que->find($_GET['id']); ?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $title['text']; ?></legend>
    <h3><?= $title['text']; ?></h3>
    <?php
    $rows = $Que->all(['subject_id' => $_GET['id']]);
    foreach ($rows as $row) {
        $total = ($title['vote'] == 0) ? 1 : $title['vote']; //判斷總投票數是否為0，避免發生分母為0的錯誤
        $rate = round(($row['vote'] / $total), 2);
    ?>
        <div style="display: flex;">
            <div style="width: 50%;"><?= $row['text']; ?></div>
            <div class="clo" style="width:<?= 40 * $rate; ?>%;"></div>
            <div style="width=10%;"><?= $row['vote']; ?>票(<?= $rate * 100; ?>%)</div>
        </div>
    <?php
    }
    ?>
    <div class="ct"><input type="button" value="返回" onclick="location.href='./index.php?do=que'"></div>
</fieldset>