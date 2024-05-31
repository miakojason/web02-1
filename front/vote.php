<?php
$title = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $title['text']; ?></legend>
    <h3><?= $title['text']; ?></h3>
    <form action="./api/vote.php" method="post">
        <?php
        $rows = $Que->all(['subject_id' => $_GET['id']]);
        foreach ($rows as $row) {
        ?>
            <div>
                <input type="radio" name="opt" value="<?= $row['id']; ?>"><?= $row['text']; ?>
            </div>
        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>