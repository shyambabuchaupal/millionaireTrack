<?php
require '../config/functions.php';
if(isset($_GET['mtid'])){
    $mtid = filterData($_GET['mtid']);
    $res = sqlSelector("SELECT `name` FROM `users` WHERE `userId` = ?",'s',$mtid);
    if(count($res)>0){
        die(json_encode($res));
    }
    else{
        $data = ['error'=>'invalid Sponsor Id'];
        die(json_encode($data));
    }
}
?>