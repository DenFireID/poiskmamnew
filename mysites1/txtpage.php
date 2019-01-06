<style>
    .content_txt{padding: 0 20%;}
</style>
<?php
require_once('includes/configu.php');

require 'block/header.php';

$text = mysqli_query($connection, "SELECT * FROM `parent`");?>
<div class="content_txt"><?
    while ($txt = mysqli_fetch_assoc($text)){
        if ($txt['id'] == $txt['parent_id']){?>
        <div class="usin">
            <a href="txtpage2.php?parent_id=<? echo $txt['id'] ?>"><h2><?php echo $txt['title']; ?></h2></a>
            <img src="../img/<? echo $txt['img']; ?>" alt="" class="" />
            <p><? echo $txt['description']?></p>
        </div>
        <?  }
    }?>
</div>

<? require 'block/footer.php';
