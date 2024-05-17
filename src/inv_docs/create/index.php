<?php
$SEO_TITLE = 'Create inv_docs';
include '../../_includes/head.php';
?>

<div class="container">
    <form class="form" action="/inv_docs/create/create-script.php" method="POST">
        <h2>Создание записи в БД</h2>
        <div class="form__div">
            <label class="form__label" for="id_invoice">id_invoice</label>
            <input class="form__input" type="number" name="id_invoice" id="id_invoice" max="9999999999999999" min="0" />
        </div>
        <div class="form__div">
            <label class="form__label" for="type_doc">type_doc</label>
            <input class="form__input" type="text" name="type_doc" id="type_doc" maxlength="3" />
        </div>
        <div class="form__div">
            <label class="form__label" for="name_doc">name_doc</label>
            <input class="form__input" type="text" name="name_doc" id="name_doc" maxlength="50" />
        </div>
        <div class="form__div">
            <label class="form__label" for="data_doc">data_doc</label>
            <input class="form__input" type="date" name="data_doc" id="data_doc" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="blank_cod">blank_cod</label>
            <input class="form__input" type="text" name="blank_cod" id="blank_cod" maxlength="6" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="seria">seria</label>
            <input class="form__input" type="text" name="seria" id="seria" maxlength="2" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="numdoc">numdoc</label>
            <input class="form__input" type="text" name="numdoc" id="numdoc" maxlength="128" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="descript_d">descript_d</label>
            <input class="form__input" type="text" name="descript_d" id="descript_d" maxlength="150" />
        </div>
        <div class="blank_cod">
            <label class="form__label" for="n_plat_t">n_plat_t</label>
            <input class="form__input" type="text" name="n_plat_t" id="n_plat_t" maxlength="10" />
        </div>
        <button class="form__button" type="success">Добавить</button>
    </form>
</div>