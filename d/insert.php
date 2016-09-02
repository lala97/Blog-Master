<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    	<link rel="stylesheet" type="text/css" href="bootstrap.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
      <div class="col-md-4 col-md-offset-4 text-center">

          <form action="" method="post" enctype="multipart/form-data">

            <!-- <input type="text" name="title" value=""> -->
            <label class="form-control-label pull-left">TEXT</label>
            <textarea class="form-control" cols="30" rows="10" name="word"></textarea>
              <label class="form-control-label pull-left">IMAGE</label>
            <input class="form-control" type="file" name="img">

            <input class="btn btn-success" type="submit" name="name" value="submit">
          </form>
      </div>
      </div>
    </div>
  </body>
</html>
<?php
include 'config.php';
// $a=new Database("localhost","root","","xeber");
// if (isset($_POST['name'])) {
// if (  $a->insert('xeber',$_POST['title'],$_POST['text'])) {
//     header('Location:show.php');
// }
// else {
//   echo "error";
// }
// }

if (isset($_POST['name'])) {
  $target_dir = "../images/";
  $target_file = date('dmYgis') . basename($_FILES['img']['name']);
  $target_type = pathinfo($target_file , PATHINFO_EXTENSION);
  move_uploaded_file($_FILES['img']['tmp_name'], $target_dir . $target_file);
 // echo $target_file;
  if ($connect->insert("crudoop2", $_POST['word'], $target_file )) {
    header('Location:show.php');
  }else{
    echo "error";
  }
}
 ?>
