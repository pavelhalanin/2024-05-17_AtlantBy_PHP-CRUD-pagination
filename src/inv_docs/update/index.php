<?php
$SEO_TITLE = 'Update inv_docs';
include '../../_includes/head.php';
?>

<?php
include '../../_includes/connect.php';
$ID = $_GET['id'];
$SQL = "SELECT * FROM `inv_docs` WHERE id = ?;";
$stmt = $conn->prepare($SQL);
$stmt->bind_param("i", $ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $DATA = $result->fetch_assoc();
} else {
    echo "No records found.";
    exit();
}

$stmt->close();
$conn->close();
?>

<div class="container">
    <form class="form" action="/inv_docs/update/update-script.php" method="POST">
        <h2>Обновление записи в БД</h2>
        <div class="form__div">
            <label class="form__label" for="id">id</label>
            <input class="form__input form__input--read-only" type="number" name="id" id="id" max="999999999" min="0"
                value="<?= $DATA['id'] ?>" readonly />
        </div>
        <div class="form__div">
            <label class="form__label" for="id_invoice">id_invoice</label>
            <input class="form__input" type="number" name="id_invoice" id="id_invoice" max="9999999999999999" min="0"
                value="<?= $DATA['id_invoice'] ?>" />
        </div>
        <div class="form__div">
            <label class="form__label" for="type_doc">type_doc</label>
            <input class="form__input" type="text" name="type_doc" id="type_doc" maxlength="3"
                value="<?= $DATA['type_doc'] ?>" />
        </div>
        <div class="form__div">
            <label class="form__label" for="name_doc">name_doc</label>
            <input class="form__input" type="text" name="name_doc" id="name_doc" maxlength="50"
                value="<?= $DATA['name_doc'] ?>" />
        </div>
        <div class="form__div">
            <label class="form__label" for="data_doc">data_doc</label>
            <input class="form__input" type="date" name="data_doc" id="data_doc" value="<?= $DATA['data_doc'] ?>" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="blank_cod">blank_cod</label>
            <input class="form__input" type="text" name="blank_cod" id="blank_cod" maxlength="6"
                value="<?= $DATA['blank_cod'] ?>" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="seria">seria</label>
            <input class="form__input" type="text" name="seria" id="seria" maxlength="2"
                value="<?= $DATA['seria'] ?>" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="numdoc">numdoc</label>
            <input class="form__input" type="text" name="numdoc" id="numdoc" maxlength="128"
                value="<?= $DATA['numdoc'] ?>" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="descript_d">descript_d</label>
            <input class="form__input" type="text" name="descript_d" id="descript_d" maxlength="150"
                value="<?= $DATA['descript_d'] ?>" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="n_plat_t">n_plat_t</label>
            <input class="form__input" type="text" name="n_plat_t" id="n_plat_t" maxlength="10"
                value="<?= $DATA['n_plat_t'] ?>" />
        </div>
        <button class="form__button" type="success">Обновить</button>
    </form>
</div>