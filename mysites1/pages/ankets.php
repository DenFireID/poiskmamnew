<?php
    require_once('includes/configu.php');

    //вывод сетки с детьми
    $per_page = 12;//сколько записей выводим
    $page = 1;//текущая страница

    //пагинация
    if (isset($_GET['page'])) {//////////////////////////////////////////////////////////////////////////////////////
        $page = (int)$_GET['page'];
    }

    $total_count_query = mysqli_query($connection, "SELECT COUNT(id) AS `total_count` FROM `children`");
    $total_count = mysqli_fetch_assoc($total_count_query);
    $total_count = $total_count['total_count'];

    $total_pages = ceil($total_count / $per_page);
    if ($page <= 1 || $page > $total_pages) {
        $page = 1;
    }
    $offset = ($per_page * $page) - $per_page;

    if (isset($_POST['gender']) && $_POST['gender'] == 'boy') {
        $childrens = mysqli_query($connection, "SELECT * FROM `children` ORDER BY `gender` LIMIT $offset, $per_page");
    } else if (isset($_POST['gender']) && $_POST['gender'] == 'girl') {
        $childrens = mysqli_query($connection, "SELECT * FROM `children` ORDER BY `gender` DESC LIMIT $offset, $per_page");
    } else if (isset($_POST['gender']) && $_POST['gender'] == '') {
        $childrens = mysqli_query($connection, "SELECT * FROM `children` ORDER BY `id` DESC LIMIT $offset, $per_page");
    } else {
        $childrens = mysqli_query($connection, "SELECT * FROM `children` ORDER BY `id` DESC LIMIT $offset, $per_page");
    }
    if (isset($_GET['page']) && $_GET['page'] > $page or !is_numeric($page)) {
        ?>
        <section class="articles containers">
            <div class="containers">
                <h3>Страница не найдена</h3>
                <img src="img/logo.png" alt="" width="90%" height="100%;">
                <p class="perror">Запрашиваемая вами страница не существует</p>
            </div>
        </section>
    <?php } else { ?>
        <div class="containers">
            <form class="sortirovka" action="index?page=1" method="post">
                <div><p class="check">Мальчики:</p><input type="checkbox" name="gender" class="check checkbox" value="boy"></div>
                <div><p class="check">Девочки:</p><input type="checkbox" name="gender" class="check checkbox" value="girl"></div>
                <input type="submit" name="" value="Показать" class="button-sortirovka">
            </form>
        </div>
        <section class="children">
        <div class="report setochka" id="report1">
        <?php
        while ($child = mysqli_fetch_assoc($childrens)) {
            ?>
            <a href="pages/children.php?id=<?php echo $child['id'] ?>" class="grids <?php echo $child['gender'] ?>">
                <img src="img/<?php echo $child['img1']; ?>" alt="" width="100%" class="img-child"/>
                <h3><?php echo $child['name']; ?></h3>
                <p class="date"><?php echo datebirth($child['age']); ?></p>
                <p class="txtanket"><?php echo mb_substr($child['description'], 0, 155, 'utf-8') . '...' ?></p>
                <div class="anket-but">Посмотреть анкету</div>
            </a>
        <?php }
    }

    //определитель возраста детей
    function datebirth($date_births) {
        $now = new DateTime(); // текущее время на сервере
        $date = DateTime::createFromFormat("Y-n-d", $date_births); // задаем дату в любом формате
        $interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
        echo "$interval->y лет $interval->m месяцев"; // кол-во лет
    } ?>
    </div>
    </section>
<?php
    $page2left = ($page - 2 > 0) ? ' <li><a href=index?page=' . ($page - 2) . '>' . ($page - 2) . '</a></li>' : '';
    $page1left = ($page - 1 > 0) ? '<li><a href=index?page=' . ($page - 1) . '>' . ($page - 1) . '</a></li>' : '';
    $page2right = ($page + 2 <= $total_pages) ? '<li><a href=index?page=' . ($page + 2) . '>' . ($page + 2) . '</a></li>' : '';
    $page1right = ($page + 1 <= $total_pages) ? '<li><a href=index?page=' . ($page + 1) . '>' . ($page + 1) . '</a></li>' : '';

    // Вывод Навигаций
    echo '<div class="paginator">';
    echo $page2left . $page1left . '<li class="activ"><b>' . $page . '</b></li>' . $page1right . $page2right;
    echo '</div>';
