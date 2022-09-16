<?php include 'inc/functions.php';
$id= $_GET['id'];
if(!isset($id)){
  echo "don't try pls..";
  die();
}
   $sector_delete = sector_delete($id);
if($sector_delete["message"] = "Success"){
  header('Location: sektorler.php?durum=1');

}
?>