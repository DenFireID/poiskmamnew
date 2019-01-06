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
    <h1><?php echo $txt['parent_title'] ?></h1>
    <div class="container">
        <?php echo $txt['text_page'] ?>
    </div>
     <? }
    }?>
</div>


<? require 'block/footer.php';