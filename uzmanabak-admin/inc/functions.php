<?php 
// if is work don't touch nerde ne yazdığımı hatırlamıyorum.
session_start();
$apiUrl = 'https://ustasiyapsin-api.herokuapp.com/api/';
if(!isset($_SESSION["login"])){
    header('Location: auth/giris.php');
    die();
}
function getJson($api){
    global $apiUrl;
    $response = file_get_contents($apiUrl.$api);
    $response = json_decode($response);
    $response = json_decode(json_encode($response), true);
    return $response;
}


function curlPost($url, $data=NULL, $req = NULL,$headers = NULL) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if(!empty($data)){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    if (!empty($req)) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $req);
    }
    $response = curl_exec($ch);

    if (curl_error($ch)) {
        trigger_error('Curl Error:' . curl_error($ch));
    }
    curl_close($ch);
    return $response;
}

function imageUpload($url, $data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true, // return the transfer as a string of the return value
        CURLOPT_TIMEOUT => 0,   // The maximum number of seconds to allow cURL functions to execute.
        CURLOPT_POST => true,   // This line must place before CURLOPT_POSTFIELDS
        CURLOPT_POSTFIELDS => $data // The full data to post
    ));

    $response = curl_exec($curl);
    $errno = curl_errno($curl);
    if ($errno) {
        return false;
    }
    curl_close($curl);
    return $response;
}

function curlJson($url, $data=NULL, $req = NULL, $headers = NULL){
    $postdata = json_encode($data);
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_POST, 1);
    if (!empty($req)) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $req);
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return $result;
}
// get all
function city_get_all(){
    return getJson('cities')['data'];
}
function category_get_all(){
    return getJson('category')['data'];
}
function bussines_get_all(){
    return getJson('user/get-business')['data'];
}
function user_get_all(){
    return getJson('user')['data'];
}
function service_get_all(){
    return getJson('service')['data'];
}
function demand_get_all(){
    return getJson('demand')['data'];
}
function sector_get_all(){
    return getJson('sector')['data'];
}
function redirectDir($url, $permanent = false){
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}//author : Erano(Mali)

// get
function service_get($id){
    return getJson('service/'.$id)['data'];
}
function sector_get($id){
    return getJson('sector/'.$id)['data'];
}
function category_get($id){
    return getJson('category/'.$id)['data'];
}
function user_get($id){
    return getJson('user/find/'.$id);
}
//delete

function service_delete($x){
    $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/service/'.$x, [
        "id" => $x,
    ], 'DELETE');
    return $s;
}
function sector_delete($x){
    $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/sector/'.$x, [
        "id" => $x,
    ], 'DELETE');
    return $s;
}
function category_delete($x){
    $s =  curlJson('ustasiyapsin-api.herokuapp.com/api/category/'.$x, [
        "id" => $x,
    ], 'DELETE');
    return $s;
}