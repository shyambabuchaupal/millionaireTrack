<?php
session_start();
$user = $_SESSION['user'];
require '../config/functions.php';
if(isset($_POST['updatePassword'])){
    $oldPassword = filterData($_POST['oldPassword']);
    $password = filterData($_POST['password']);
    $confirmPassword = filterData($_POST['confirmPassword']);
    $res = sqlSelector('SELECT `password` FROM `users` WHERE `secret_key` = ?','s',$user);
    if(count($res)>0){
        if($res[0]['password']===$oldPassword){
            $res = sqlUpdate('UPDATE `users` SET `password`=? WHERE `secret_key` = ?','ss',$password,$user);
            if($res){
                ?>
                <script>
                    alert("Password Updated");
                    window.location.href = "../edit-profile.php";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Something Went Wrong");
                    window.location.href = "../edit-profile.php";
                </script>
                <?php
            }
        }
        else{
            ?>
                    <script>
                        alert("Please Enter The Correct Password");
                        window.location.href = "../edit-profile.php";
                    </script>
                    <?php
        }
    }
}
?>