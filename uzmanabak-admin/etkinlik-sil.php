<?php include 'inc/functions.php';
$id= $_GET['id'];
if(!isset($id)){
  echo "don't try pls..";
  die();
}
   $service_delete = service_delete($id);
if($service_delete["message"] = "Success"){
  header('Location: etkinlikler.php?durum=1');

}
?>