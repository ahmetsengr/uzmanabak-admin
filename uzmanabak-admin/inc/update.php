<?php 
include 'functions.php';

// Takes raw data fro
$data = json_encode($_POST);
print_r($data);


switch($_POST['x']){
    case "service": 
        $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/service/'.$_POST['id'], json_decode($data), 'PUT');
        if($s['message'] == "Register Successfully"){
        header('Location: ../login.php&d=ok');
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. '?&=hata&m='.$s['message']);
        }
        break;
    case "sector": 
        $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/sector/'.$_POST['id'], json_decode($data), 'PUT');
        if($s['message'] == "Success"){
            header('Location: ' . $_SERVER['HTTP_REFERER']. '&d=ok');
        }else{
           header('Location: ' . $_SERVER['HTTP_REFERER']. '&=hata&m='.$s['message']);
        }
        break;
    case "category": 
        $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/category/'.$_POST['id'], json_decode($data), 'PUT');
        if($s['message'] == "Success"){
            header('Location: ' . $_SERVER['HTTP_REFERER']. '&d=ok');
        }else{
           header('Location: ' . $_SERVER['HTTP_REFERER']. '&=hata&m='.$s['message']);
        }
        break;
      case "user": 
        $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/user/'.$_POST['id'], json_decode($data), 'PUT');
        if($s['message'] == "Success"){
            header('Location: ../uyeler.php?durum=1');
        }else{
            header('Location: ../uyeler.php?durum=2');
        }
        break;
}

?>