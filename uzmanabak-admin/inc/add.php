<?php 
include 'functions.php';
$data = $_POST;
// resim yükle

if($_FILES['img']){
$tmp_files = "../tmp_img/".$_FILES['img']['name'];
move_uploaded_file($_FILES["img"]["tmp_name"], $tmp_files);
$imgs = curl_file_create($tmp_files);
$dataimage = array(
    "myFile" => $imgs
);
$img = imageUpload('ustasiyapsin-api.herokuapp.com/api/uploadImage', $dataimage);
$data["img"] = $_FILES['img']['name'];
}

$data = json_encode($data);
$name = $_POST['name'];
$companyName = $_POST['companyName'];
$sector = $_POST['sector'];
$title = $_POST['title'];
$description = $_POST['description'];
$imgdata = $data["img"];
$about = $_POST['about'];
$isActive = $_POST['isActive'];
$showHome = $_POST['showHome'];
$veri = ' "user":"61e207a67d93ad83911c3824",
"name":"sadsad",
"companyName":"Şirket Adı",
"sector":"sinema",
"category":"sinema",
"city":"İzmir",
"distinct":"Konak",
"questions":[""],
"answer":[""],
"title":"Başlık",
"description":"Açıklama",
"img":"baget1.PNG",
"rating":0,
"ratingCount":0,
"comments":[""],
"about":"Hakkında Yazısı",
"isActive":true,
"showHome":true,
"price":123,
"priceTwo":123,
"personCount":"0"';
print_r($data);
switch($_POST['x']){
    case "service": 
        $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/service', json_decode($data), 'POST');
        print_r($s);
        break;
    case "sector": 
       
                $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/sector', json_decode($data), 'POST');
                if($s['message'] == "Success"){
                    header('Location: ../sektorler.php?durum=1');
                }else{
                    header('Location: ../sektorler.php?durum=2');
                }
          
            break;
            case "category": 
                $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/category', json_decode($data), 'POST');
                if($s['message'] == "Success"){
                    header('Location: ../kategoriler.php?durum=1');
                }else{
                    header('Location: ../kategoriler.php?durum=2');
                }
          
            break;
}

?>