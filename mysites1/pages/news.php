<?php require '../block/header.php'; //вывод сетки со статьями?>
<?php include "../includes/configu.php"; ?>
<?php
$per_page = 10;//сколько записей выводим
$page = 1;//текущая страница
//пагинация
  if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
  }
  $total_count_query = mysqli_query($connection, "SELECT COUNT(id) AS `total_count` FROM `articles`");
  $total_count = mysqli_fetch_assoc($total_count_query);
  $total_count = $total_count['total_count'];

  $total_pages = ceil($total_count / $per_page);
  if ($page <= 1 || $page > $total_pages) {
    $page = 1;
  }
  $offset = ($per_page * $page) - $per_page;
  $arcticles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `pubdate` DESC LIMIT $offset, $per_page");

  if(!is_numeric($_GET['page']) or $_GET['page'] > $page){
  ?>
    <section class="articles containers">
      <div class="containers">
        <h3>Страница новостей не найдена</h3>
        <img src="../img/logo.png" alt="" width="90%" height="100%;">
        <p class="perror">Запрашиваемая вами страница не существует</p>
      </div>
    </section>
<?php
  }else{?>
    <h1 class="newsh1">Новости</h1>
    <?php
    while ($art = mysqli_fetch_assoc($arcticles) )
    {
      ?>
    <article class="news containers">
      <div class="wrap-news containers">
        <div>
          <a href="../pages/article.php?id=<?php echo $art['id'] ?>"><?php echo mb_substr($art['title'], 0, 50, 'utf-8') . '...' ?><hr></a>
          <p class="datanews"><?php echo $art['pubdate'] ?></p>
        </div>
        <div class="news-content">
          <img src="../img/<?php echo $art['img']; ?>" alt="" width="80%">
          <p><?php echo mb_substr($art['text'], 0, 275, 'utf-8') . ' ...' ?></p>
        </div>
        <hr>
      </div>
    </article>
    <?php }
    }
      if($page - 2 > 0) $page2left = ' <li><a href=news?page='. ($page - 2) .'>'. ($page - 2) .'</a></li>';
      if($page - 1 > 0) $page1left = '<li><a href=news?page='. ($page - 1) .'>'. ($page - 1) .'</a></li>';
      if($page + 2 <= $total_pages) $page2right = '<li><a href=news?page='. ($page + 2) .'>'. ($page + 2) .'</a></li>';
      if($page + 1 <= $total_pages) $page1right = '<li><a href=news?page='. ($page + 1) .'>'. ($page + 1) .'</a></li>';

      // Вывод Навигаций

      echo '<div class="paginator">';
      echo $pervpage.$page2left.$page1left.'<li class="activ"><b>'.$page.'</b></li>'.$page1right.$page2right.$nextpage;
      echo '</div>';
    ?>

<?php require '../block/footer.php';?>
