<style>
    .content_txt{padding: 0 20%;}
</style>

<?php
require_once('includes/configu.php');

require 'block/header.php';

$get = (int) $_GET['parent_id'];
$text = mysqli_query($connection, "SELECT * FROM `parent` ");?>
<div class="content_txt"><?
    while ($txt = mysqli_fetch_assoc($text)){
    if ($get == $txt['parent_id']){?>
        <h1><?php echo $txt['title'] ?></h1>
        <div class="usen">
            <a href="txtpage3.php?id=<?php echo $txt['id'] ?>"><h2><?php echo $txt['parent_title']; ?></h2></a>
            <img src="img/<?php echo $txt['parent_img']; ?>"  width="10%" class="img"/>
            <p><?php echo $txt['parent_description']?></p>
        </div>
       <? if (empty($txt['parent_img'])){?>
        <style>
            h1{text-align: center; color: #f88b05; padding: 2% 0}
            img{display: none;}
        </style>
    <?}
    }
}?>
</div>


<? require 'block/footer.php';