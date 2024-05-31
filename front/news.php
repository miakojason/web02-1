<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td></td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], " limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td width="30%" class="clo list" data-id="<?= $row['id']; ?>"><?= $row['title']; ?></td>
                <td>
                    <div class="s<?= $row['id']; ?>"><?= mb_substr($row['text'], 0, 20); ?>....</div>
                    <pre class="a<?= $row['id']; ?>" style="display: none;"><?= $row['text']; ?></pre>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['acc' => $_SESSION['user'], 'news' => $row['id']]) > 0) {
                    ?>
                            <a onclick="good(<?= $row['id']; ?>)">收回讚</a>
                        <?php
                        } else {
                        ?>
                            <a onclick="good(<?= $row['id']; ?>)">讚</a>
                    <?php
                        }
                    }

                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if ($now > 1) {
            $prev = $now - 1;
            echo "<a href='?do=$do&p=$prev'><</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? '24px' : '16px';
            echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'>$i</a>";
        }
        if ($now < $pages) {
            $next = $now + 1;
            echo "<a href='?do=$do&p=$next'>></a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $(".list").on("click", function() {
        let id = $(this).data('id');
        $(".s" + id).toggle()
        $(".a" + id).toggle()
    })


    function good(news){
        $.post("./api/good.php",{news},()=>{
            location.reload();
        })
    }
</script>