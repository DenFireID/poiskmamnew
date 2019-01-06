<?php require '../block/header.php'; //вывод каждой отдельной статьй?>
<?php include "../includes/configu.php"; ?>
<?php
  $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` =  " . (int) $_GET['id']);

  if(mysqli_num_rows($articles) <= 0){
  ?>
  <section class="articles containers">
    <div class="containers">
      <h3>Статья не найдена</h3>
      <img src="../img/logo.png" alt="" width="90%" height="100%;">
      <p class="perror">Запрашиваемая вами статья не существует</p>
    </div>
  </section>
  <?php
}else{
    $art = mysqli_fetch_assoc($articles);?>
    <section class="articles containers">
      <div class="containers">
        <h3><?php echo $art['title']; ?></h3>
        <p><?php echo $art['pubdate']; ?></p>
        <p><?php echo $art['text'];?></p>

      </div>
    </section>
<?php } ?>
<?php require '../block/footer.php';?>
