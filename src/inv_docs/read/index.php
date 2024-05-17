<?php
$SEO_TITLE = 'Read inv_docs';
include '../../_includes/head.php';
?>

<?php
include '../../_includes/connect.php';
$SQL = 'SELECT COUNT(*) AS total FROM `inv_docs`;';
$TOTAL_ITEMS = mysqli_fetch_assoc($conn->query($SQL))['total'];

$LIMIT_ITEMS = (int) (isset($_GET['limit']) ? $_GET['limit'] : 10);
$CURRENT_PAGE = (int) (isset($_GET['page']) ? $_GET['page'] : 1);
$SKIP_ITEMS = (int) $LIMIT_ITEMS * ((int) $CURRENT_PAGE - 1);
$LAST_PAGE = ceil((int) $TOTAL_ITEMS / (int) $LIMIT_ITEMS);

$sql = 'SELECT * FROM `inv_docs` LIMIT ' . $LIMIT_ITEMS . ' OFFSET ' . $SKIP_ITEMS . ';';
$result = $conn->query($sql);
$arr = array();
for ($item = mysqli_fetch_assoc($result), $i = 0; $item != ""; $item = mysqli_fetch_assoc($result), $i += 1) {
    $arr[$i] = $item;
}
?>

<div class="container">
    <p style="text-align: right;">
        <a href="/inv_docs/create">Добавить</a>
    </p>
    <div class="table__block">

        <table class="table">
            <caption>Таблица - inv_docs</caption>
            <thead>
                <tr>
                    <td>id</td>
                    <td>id_invoice</td>
                    <td>type_doc</td>
                    <td>name_doc</td>
                    <td>data_doc</td>
                    <td>blank_cod</td>
                    <td>seria</td>
                    <td>numdoc</td>
                    <td>descript_d</td>
                    <td>n_plat_t</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($arr); ++$i) {
                    ?>
                    <tr>
                        <td><?= $arr[$i]['id'] ?></td>
                        <td><?= $arr[$i]['id_invoice'] ?></td>
                        <td><?= $arr[$i]['type_doc'] ?></td>
                        <td><?= $arr[$i]['name_doc'] ?></td>
                        <td><?= $arr[$i]['data_doc'] ?></td>
                        <td><?= $arr[$i]['blank_cod'] ?></td>
                        <td><?= $arr[$i]['seria'] ?></td>
                        <td><?= $arr[$i]['numdoc'] ?></td>
                        <td><?= $arr[$i]['descript_d'] ?></td>
                        <td><?= $arr[$i]['n_plat_t'] ?></td>
                        <td><a href="/inv_docs/update?id=<?= $arr[$i]['id'] ?>">edit</a></td>
                        <td><a href="/inv_docs/delete?id=<?= $arr[$i]['id'] ?>">delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="pages__block">
        <ul class="pages__ul">

            <li class="pages__li">
                <a class="pages__a" href="/inv_docs/read?page=1&limit=<?= $LIMIT_ITEMS ?>">1</a>
            </li>

            <li class="pages__li">...</li>

            <?php if ($CURRENT_PAGE - 2 >= 1) { ?>
                <li class="pages__li">
                    <a class="pages__a"
                        href="/inv_docs/read?page=<?= $CURRENT_PAGE - 2 ?>&limit=<?= $LIMIT_ITEMS ?>"><?= $CURRENT_PAGE - 2 ?></a>
                </li>
            <?php } ?>

            <?php if ($CURRENT_PAGE - 1 >= 1) { ?>
                <li class="pages__li">
                    <a class="pages__a"
                        href="/inv_docs/read?page=<?= $CURRENT_PAGE - 1 ?>&limit=<?= $LIMIT_ITEMS ?>"><?= $CURRENT_PAGE - 1 ?></a>
                </li>
            <?php } ?>

            <li class="pages__li">
                <a class="pages__a pages__a--current"
                    href="/inv_docs/read?page=<?= $CURRENT_PAGE ?>&limit=<?= $LIMIT_ITEMS ?>"><?= $CURRENT_PAGE ?></a>
            </li>

            <?php if ($CURRENT_PAGE + 1 <= $LAST_PAGE) { ?>
                <li class="pages__li">
                    <a class="pages__a"
                        href="/inv_docs/read?page=<?= $CURRENT_PAGE + 1 ?>&limit=<?= $LIMIT_ITEMS ?>"><?= $CURRENT_PAGE + 1 ?></a>
                </li>
            <?php } ?>

            <?php if ($CURRENT_PAGE + 2 <= $LAST_PAGE) { ?>
                <li class="pages__li">
                    <a class="pages__a"
                        href="/inv_docs/read?page=<?= $CURRENT_PAGE + 2 ?>&limit=<?= $LIMIT_ITEMS ?>"><?= $CURRENT_PAGE + 2 ?></a>
                </li>
            <?php } ?>

            <li class="pages__li">...</li>

            <li class="pages__li">
                <a class="pages__a"
                    href="/inv_docs/read?page=<?= $LAST_PAGE ?>&limit=<?= $LIMIT_ITEMS ?>"><?= $LAST_PAGE ?></a>
            </li>

        </ul>
    </div>
    <div class="limit_pages__block">
        <form action="/inv_docs/read/index.php" method="GET">
            Сколько записей:
            <select name="limit">
                <option value="<?= $LIMIT_ITEMS ?>"><?= $LIMIT_ITEMS ?></option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
            </select>
            <button type="success">Загрузить</button>
        </form>
    </div>

    <p>Текущая страница: <?= $CURRENT_PAGE; ?></p>
    <p>Последняя страница: <?= $LAST_PAGE; ?></p>
    <p>Количество элементов в выборке: <?= $LIMIT_ITEMS; ?></p>
    <p>Пропущено элементов: <?= $SKIP_ITEMS; ?></p>
    <p>Количество элементов: <?= $TOTAL_ITEMS; ?></p>
</div>

<?php
$conn->close();
?>