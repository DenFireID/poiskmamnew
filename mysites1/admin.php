<?php
    /*session_start();
    if (empty($_SESSION['user'])){
      header('Location: index.php');
      exit;
    }
    else{*/
?>
<a href="logout.php" class="logout">Выход</a><br>
<style media="screen">
    * {padding: 0;margin: 0;}
    body {background: #878787;padding: 1%; }
    section {text-align: center;}
    form {display: flex;flex-direction: column;width: 80%;padding: 2% 10% 5% 10%}
    input {margin: 0.7% 0;height: 30px;border-radius: 5px;padding-left: 1%;}
    .logout{color: black;font-size: 20px;font-weight: bold;float: right;text-decoration: none;}
    .logout:hover{color: red}
    .setkadel {display: grid;grid-template-columns: 3fr 2fr;}
    .subm {border: none;margin-top: 1.3%}
    .subm {font-size: 20px;background: #e5e5e5;outline: none;box-shadow: 0 0 5px #000;}
    /*вывод для удаления*/
    .setka-news-admin {display: flex;flex-direction: row;padding: 0 10%;}
    .setka-news-admin p {border: 1px solid black;width: 100%;padding: 0.6%;font-size: 18px;}
    .iddelete {width: 3% !important;}
    textarea {white-space: pre;}
    select {margin: 2% 0 0 0}
    ul.tabs {margin: 0;padding: 0;list-style: none;height: 32px;}
    ul.tabs li {float: left;margin: 0;padding: 0;height: 31px;line-height: 31px;border: 1px solid #999;border-left: none;margin-bottom: -1px;background: #e0e0e0;overflow: hidden;position: relative;}
    ul.tabs li a {text-decoration: none;color: #000;display: block;font-size: 1.2em;padding: 0 20px;border: 1px solid #fff;outline: none;}
    ul.tabs li a:hover {background: #ccc;}
    html ul.tabs li.active, html ul.tabs li.active a:hover {background: #fff;border-bottom: 1px solid #fff;}
    .tab_container {border: 1px solid #999;border-top: none;width: 100%;background: #c0c0c0;}
    .tab_content {padding: 20px;font-size: 1.2em;}
    .delchildren{display: grid;grid-template-columns: 3fr 2fr;}
    .setka_input{display: grid;grid-template-columns: 2fr 8fr;}
    label{text-align: left;}
    .form_txt{text-align: left;}
    select{padding: 0.8% 1%; margin: 1.5% 0; border-radius: 20px; font-size: 16px; font-weight: bold}
    h3{padding: 2% 0; text-align: center; font-size: 36px;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //Действия по умолчанию
        $(".tab_content").hide(); //скрыть весь контент
        $("ul.tabs li:first").addClass("active").show(); //Активировать первую вкладку
        $(".tab_content:first").show(); //Показать контент первой вкладки

        //Событие по клику
        $("ul.tabs li").click(function () {
            $("ul.tabs li").removeClass("active"); //Удалить "active" класс
            $(this).addClass("active"); //Добавить "active" для выбранной вкладки
            $(".tab_content").hide(); //Скрыть контент вкладки
            var activeTab = $(this).find("a").attr("href"); //Найти значение атрибута, чтобы определить активный таб + контент
            $(activeTab).fadeIn(); //Исчезновение активного контента
            return false;
        });
    });
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php
    require_once "includes/configu.php";

    $idchild = $_POST['idchild'];
    if (sizeof($_POST) > 0) { //children
        $img1 = $_FILES["img1"]["name"];
        $img2 = $_FILES['img2']["name"];
        $img3 = $_FILES['img3']["name"];
        $img4 = $_FILES['img4']["name"];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $description = nl2br($_POST['description']);
        $gender = $_POST['gender'];
        $video = $_POST['video'];
        $db_table_child = "children";
    }

    if (isset($_POST['iddelete'])) {   //удаление записей
        $delchild = $_POST['iddelete'];
        $deletechild = mysqli_query($connection, "DELETE FROM `children` WHERE id =" . $delchild);
    }

    //проверки
    if (empty($description) || empty($age) || empty($name) || empty($gender)) {
        $pole =  "не все поля заполнены в добавлений ребенка<br>";
    } else {
        $resultchild = mysqli_query($connection, "INSERT INTO " . $db_table_child . " (img1,img2,img3,img4,name,age,description,gender,video) VALUES ('$img1','$img2','$img3','$img4','$name','$age','$description','$gender','$video')");
        if ($resultchild == true) {
            $itog = "Информация занесена в базу данных<br>";

        } else {
            $itog = "Информация не занесена в базу данных<br>";
            echo $resultchild;
        }
    }

    if (isset($_POST['title'])) {//news
        $title = $_POST['title'];
        $text = $_POST['txt'];
        $pubdate = $_POST['pubdate'];
        /*$text1 = nl2br($_POST['text1']);
          $image1 = $_POST['image1'];
          $text2 = nl2br($_POST['text2']);
          $image2 = $_POST['image2'];
          $text3 = nl2br($_POST['text3']);
          $image3 = $_POST['image3'];
          $text4 = nl2br($_POST['text4']);
          $image4 = $_POST['image4'];
          $views = $_POST['views'];
          $author = $_POST['author'];*/
        $db_table = "articles";
    }

    if (isset($_POST['iddel'])) {//удаление записей
        $del = $_POST['iddel'];
        $delete = mysqli_query($connection, "DELETE FROM `articles` WHERE id =" . $del);
    }

    //проверки
    if (empty($title)) {
        $polen =  "не все поля заполнены в новостях<br>";
    } else {
        $result = mysqli_query($connection, "INSERT INTO " . $db_table . " (title, text, pubdate) VALUES ('$title', '$text', '$pubdate')");
        if ($result == true) {
            $itogo =  "Информация занесена в базу данных";

        } else {
            $itogo = "Информация не занесена в базу данных";
        }
    }
       // Проверяем загружен ли файл
       if((is_uploaded_file($_FILES["img1"]["tmp_name"])) or (is_uploaded_file($_FILES["img2"]["tmp_name"]))
           or (is_uploaded_file($_FILES["img3"]["tmp_name"])) or (is_uploaded_file($_FILES["img4"]["tmp_name"])) or (is_uploaded_file($_FILES["file_text"]["tmp_name"]))) {
         // Если файл загружен успешно, перемещаем его из временной директории в конечную
         move_uploaded_file($_FILES["img1"]["tmp_name"], "img/".$_FILES["img1"]["name"]);
         move_uploaded_file($_FILES["img2"]["tmp_name"], "img/".$_FILES["img2"]["name"]);
         move_uploaded_file($_FILES["img3"]["tmp_name"], "img/".$_FILES["img3"]["name"]);
         move_uploaded_file($_FILES["img4"]["tmp_name"], "img/".$_FILES["img4"]["name"]);
         move_uploaded_file($_FILES["file_text"]["tmp_name"], "img/".$_FILES["file_text"]["name"]);
       } else {
          $message = "файл не загружен";
       }

?>
<?php
if (sizeof($_POST) > 0) { //children
    $id_text = $_POST['select_txt'];
    $text_title = $_POST['text_page'];
    $description_text = $_POST['description_page'];
    $text_img = $_FILES['file_text']['name'];
    $text_page = $_POST['text'];
}
    /*echo "id_text ";  var_dump($id_text);
    echo "text_title "; var_dump($text_title);
    echo "description_text "; var_dump($description_text);
    echo "text_img "; var_dump($text_img);
    echo "text_page "; var_dump($text_page);*/
    if (empty($text_title) || empty($description_text)) {
        $pole_text =  "не все поля заполнены<br>";
    } else {
        $result_text = mysqli_query($connection, "INSERT INTO  `parent`  (title, img, description, parent_id, parent_title, parent_description, parent_img, text_page) VALUES ('', '', '', '$id_text','$text_title','$description_text','$text_img','$text_page')");
        if ($result_text == true) {
            $itog_text = "Информация занесена в базу данных<br>";

        } else {
            $itog_text = "Информация не занесена в базу данных<br>";
            echo $result_text;
        }
        echo $pole_text; echo $itog_text; echo $result_text;
    }?>
<section>
    <ul class="tabs">
        <li class="active"><a href="#tab1">Добавить новость</a></li>
        <li class=""><a href="#tab2">Добавить ребенка</a></li>
        <li class=""><a href="#tab3">Добавить текстовую статью</a></li>
    </ul>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <div class="columns">
                <h1>Добавить новость:</h1>
                <p><?php echo $itogo ?></p>
                <p><?php echo  $polen?></p>
                <form method="POST" action="admin.php" enctype='multipart/form-data'>
                    <input name="title" type="text" placeholder="Заголовок"/>
                    <input name="pubdate" type="date" placeholder="data"/>
                    <textarea id="editor1" name="txt" cols="100" rows="20"></textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('editor1', {
                            extraPlugins: 'image2,uploadimage',
                            filebrowserUploadUrl: 'ckeditor/upload.php?command=QuickUpload&type=Files',
                            filebrowserImageUploadUrl: 'ckeditor/upload.php?command=QuickUpload&type=Images',
                            // format_tags: 'p;h1;h2;h3;pre', // Reduce the list of block elements listed in the Format drop-down to the most commonly used.
                            height: 550
                        });
                    </script>
                    <input type="submit" name="" value="ДОБАВИТЬ">
                    <!--<input name="title" type="text" placeholder="title"/>
                    <textarea name="text1" rows="10" cols="10" placeholder="text1"></textarea>
                    <input name="image1" type="text" placeholder="img1"/>
                    <textarea name="text2" rows="10" cols="10" placeholder="text2"></textarea>
                    <input name="image2" type="text" placeholder="img2"/>
                    <textarea name="text3" rows="10" cols="10" placeholder="text3"></textarea>
                    <input name="image3" type="text" placeholder="img3"/>
                    <textarea name="text4" rows="10" cols="10" placeholder="text4"></textarea>
                    <input name="image4" type="text" placeholder="img4"/>
                    <input type="text" name="author" placeholder="Автор">
                    <input type="submit" value="Отправить" class="subm"/>-->
                </form>
                <?php
                    //вывод статей таблицы для удаления
                    $article = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id`");
                    while ($art = mysqli_fetch_assoc($article)) {
                        ?>
                        <div class="setka-news-admin">
                            <p class="iddelete"><?php echo $art['id'] ?></p>
                            <p><?php echo $art['title']; ?></p>
                        </div>
                    <?php } ?>
                <p>введите id записи которую нужно удалить</p>
                <form method="POST" action="admin.php" class="setkadel">
                    <input name="iddel" type="number" placeholder="id" value="id" class="indel">
                    <input type="submit" value="удалить" class="subm"/>
                </form>
            </div>
        </div>
        <div id="tab2" class="tab_content">
            <div class="columns">
                <h1>Добавить ребенка:</h1>
                <p><?php echo $message; echo $itog?></p>
                <p><?php echo  $pole?></p>
                <form method="POST" action="admin.php" enctype="multipart/form-data">
                    <div class="setka_input">
                      <label for="img1">Первое фото</label>
                      <input name="img1" type="file"/>
                      <label for="img2">Второе фото</label>
                      <input name="img2" type="file"/>
                      <label for="img3">Третье фото</label>
                      <input name="img3" type="file"/>
                      <label for="img4">Четвертое фото</label>
                      <input name="img4" type="file"/>
                    </div>
                    <input name="name" type="text" placeholder="name"/>
                    <input name="age" type="date" placeholder="age"/>
                    <textarea name="description" rows="10" cols="10" placeholder="text"></textarea>
                    <select size="3" name="gender">
                        <option value="boys">Мальчик</option>
                        <option value="girls">Девочка</option>
                    </select>
                    <input name="video" type="text" placeholder="video"/>
                    <input type="submit" value="Отправить" class="subm"/>
                </form>
                <?php
                    //вывод статей таблицы для удаления
                    $childrens = mysqli_query($connection, "SELECT * FROM `children` ORDER BY `id`");
                    while ($child = mysqli_fetch_assoc($childrens)) {
                        ?>
                        <div class="setka-news-admin">
                            <p class="iddelete"><?php echo $child['id'] ?></p>
                            <p><?php echo $child['name']; ?></p>
                        </div>
                    <?php } ?>
                    <p>введите id записи которую нужно удалить</p>
                <form method="POST" action="admin.php" class="delchildren">
                    <input name="iddelete" type="number" placeholder="id" value="id">
                    <input type="submit" value="удалить" class="subm"/>
                </form>
            </div>
        </div>
        <?
        $text_query = mysqli_query($connection, "SELECT * FROM `parent` ");

        ?>
        <div id="tab3" class="tab_content">
            <div class="columns">
                <form method="post" class="form_txt" action="admin.php" id="form_txt" enctype='multipart/form-data'>
                    <p>Куда добавляем?</p>
                    <select name="select_txt" id="selector"> <?
                    while ($txt = mysqli_fetch_assoc($text_query)) {
                         if ($txt['id'] == $txt['parent_id']) { ?>
                             <option value="<? echo $txt['id']; ?>"><? echo $txt['title'] ?></option>
                        <?}
                    }?>
                    </select>
                    <p>Заголовок и краткое описание статьй<br> <? echo $pole_text; echo $itog_text; echo $result_text?></p>
                    <input type="text" name="text_page" placeholder="Заголовок">
                    <input type="text" name="description_page" placeholder="Красткое описание">
                    <label for="file_text">Картинка для превью в реальных историях</label>
                    <input type="file" name="file_text" id="file_text">
                    <h3>Статья</h3>
                    <textarea id="editor" name="text" cols="100" rows="20"></textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('editor', {
                            extraPlugins: 'image2,uploadimage',
                            filebrowserUploadUrl: 'ckeditor/upload.php?command=QuickUpload&type=Files',
                            filebrowserImageUploadUrl: 'ckeditor/upload.php?command=QuickUpload&type=Images',
                            height: 550
                        });
                    </script>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
</section>

<?php /*}*/

