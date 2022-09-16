<?php include 'inc/functions.php';
$id= $_GET['id'];
if(!isset($id)){
  echo "don't try pls..";
  die();
}
   $category_delete = category_delete($id);
if($category_delete["message"] = "Success"){
  header('Location:kategoriler.php?durum=1');

}
?>