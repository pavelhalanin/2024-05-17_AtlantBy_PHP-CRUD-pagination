<?php
$SEO_TITLE = 'Result delete inv_docs';
include '../../_includes/head.php';
include '../../_includes/connect.php';

$id = $_POST['id'];

$SQL = "DELETE FROM inv_docs \n"
    . " WHERE `id` = '$id';";
if ($conn->query($SQL) != TRUE) {
    ?>

    <div class="container">
        <p class="p__error">Элемент не удален из БД</p>
        <p class="p__error">SQL</p>
        <pre class="pre"><?= $SQL ?></pre>
        <p class="p__error"><?= $conn->error ?></p>
    </div>

    <?php
} else {
    ?>

    <div class="container">
        <p class="p__success">Элемент удален из БД</p>
        <p><a href="/inv_docs/read">Вернуться к таблице</a></p>
    </div>

    <?php
}

$conn->close();
