<?php require '../block/header.php' //вывод каждого ребенка ?>
<?php require '../includes/configu.php';?>
<?php
$childrens = mysqli_query($connection, "SELECT * FROM `children` WHERE `id` =  " . (int) $_GET['id']);

 if(mysqli_num_rows($childrens) <= 0){
 ?>
 <section class="articles containers">
   <div class="containers">
     <h3>Ребенок не найден</h3>
     <img src="../img/logo.png" alt="" width="90%" height="100%;">
     <p class="perror">Запрашиваемый вами ребенок не существует</p>
   </div>
 </section>
 <?php
 }else{
   $child = mysqli_fetch_assoc($childrens);?>
   <section class="containers">
     <div class="cardholder">
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img src="../img/<?php echo $child['img1']; ?>" alt="" width="100%" class="d-block w-100" />
           </div>
           <div class="carousel-item">
             <img src="../img/<?php echo $child['img2']; ?>" alt="" width="100%" class="d-block w-100" />
           </div>
           <div class="carousel-item">
             <img src="../img/<?php echo $child['img3']; ?>" alt="" width="100%" class="d-block w-100" />
           </div>
           <div class="carousel-item">
             <img src="../img/<?php echo $child['img4']; ?>" alt="" width="100%" class="d-block w-100" />
           </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div>
       <div class="descrip">
         <h1><?php echo $child['name'];?></h1> <!--ИМЯ-->
         <h5><?php  echo datebirth($child['age']);?></h5><!--РОДИЛСЯ В ...-->
         <p><?php echo $child['description'];?></p>
         <div class="videos">
           <?php echo $child['video'];?>
         </div>
         <div class="qest">
           <p>По вопросам семейного устроиства обращаться в отдел опеки и попечительства над несовершеннолетними Министерства социального развития Пермского края: 614006б, Пермь, ул.Ленина,51, кабинет 208<br>Телефон: (342) 240-46-59</p>
         </div>
       </div>
     </div>
   </section>
 <?php } ?>

  <?php
  //определитель возраста детей
		function datebirth($date_births){
		  $now = new DateTime(); // текущее время на сервере
		  $date = DateTime::createFromFormat("Y-n-d", $date_births); // задаем дату в любом формате
		  $interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
		  echo "$interval->y лет $interval->m месяцев"; // кол-во лет
		}?>
 <?php require '../block/footer.php';?>
