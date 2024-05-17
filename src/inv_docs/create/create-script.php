<?php
$SEO_TITLE = 'Result create inv_docs';
include '../../_includes/head.php';
include '../../_includes/connect.php';

$id_invoice = $_POST['id_invoice'];
$type_doc = $_POST['type_doc'];
$name_doc = $_POST['name_doc'];
$data_doc = $_POST['data_doc'];
$blank_cod = $_POST['blank_cod'];
$seria = $_POST['seria'];
$numdoc = $_POST['numdoc'];
$descript_d = $_POST['descript_d'];
$n_plat_t = $_POST['n_plat_t'];

if (!is_numeric($id_invoice)) {
    $MSG = 'id_invoice не имеет тип число (N, 16)';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if ($id_invoice > 9999999999999999 && $id_invoice < 0) {
    $MSG = 'id_invoice не входит в диапазон [0; 9999999999999999] (N, 16)';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($type_doc) > 3) {
    $MSG = 'type_doc должен иметь максимальную длину 3 (С, 3 - VARCHAR(3))';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($name_doc) > 50) {
    $MSG = 'name_doc должен иметь максимальную длину 50 (С, 50 - VARCHAR(50))';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($date_doc) > 10 && strlen($date_doc) == 0) {
    $MSG = 'data_doc должен иметь формат YYYY-MM-DD (D - DATE)';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($blank_cod) > 6) {
    $MSG = 'blank_cod должен иметь максимальную длину 6 (С, 6 - VARCHAR(6))';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($seria) > 2) {
    $MSG = 'seria должен иметь максимальную длину 2 (С, 2 - VARCHAR(2))';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($numdoc) > 128) {
    $MSG = 'numdoc должен иметь максимальную длину 128 (С, 128 - VARCHAR(128))';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($descript_d) > 150) {
    $MSG = 'descript_d должен иметь максимальную длину 150 (С, 150 - VARCHAR(150))';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

if (strlen($n_plat_t) > 10) {
    $MSG = 'n_plat_t должен иметь максимальную длину 10 (С, 10 - VARCHAR(10))';
    ?>
    <div class="container">
        <p class="p__error"><?= $MSG ?></p>
    </div>
    <?php
    exit;
}

$SQL = "INSERT inv_docs (`id_invoice`, `type_doc`, `name_doc`, `data_doc`, `blank_cod`, `seria`, `numdoc`, `descript_d`, `n_plat_t`)\n"
    . "VALUES ('$id_invoice', '$type_doc', '$name_doc', '$data_doc', '$blank_cod', '$seria', '$numdoc', '$descript_d', '$n_plat_t')";
if ($conn->query($SQL) != TRUE) {
    ?>

    <div class="container">
        <p class="p__error">Элемент не добавлен в БД</p>
        <p class="p__error">SQL</p>
        <pre class="pre"><?= $SQL ?></pre>
        <p class="p__error"><?= $conn->error ?></p>
    </div>

    <?php
} else {
    ?>

    <div class="container">
        <p class="p__success">Элемент добавлен в БД</p>
        <p><a href="/inv_docs/read">Вернуться к таблице</a></p>
    </div>

    <?php
}

$conn->close();
