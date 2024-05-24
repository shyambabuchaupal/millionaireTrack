<?php
session_start();
require '../config/functions.php';
$error = [];
if (isset($_POST['loginUser'])) {
    $email =filterData($_POST['email']);
    $password = filterData($_POST['password']);
    $emailValid = explode('@', $email);
    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Invalid Email Address";
    } elseif (!checkdnsrr($emailValid[1], "MX")) {
        $error[] = 'Invalid Email Address 1';
    }
    if (!isset($password)) {
        $error[] = "Password Can't Be Empty";
    }
    print_r($error);
    if (empty($error)) {
        $result = sqlSelector('SELECT `userId`,`password`,`profile` FROM users WHERE email =?', 's',$email);
        $user_id = $result[0]['userId'];
        $row = count($result);
        if($row>0){
            $pass = $result[0]['password'];
            if($password === $pass){
                $secret_id = md5($user_id.time());
                $update_id  = sqlUpdate("UPDATE `users` SET `secret_key`=? WHERE `email` = ?",'ss',$secret_id,$email);
                if($update_id){
                    $_SESSION['user'] = $secret_id;
                    $_SESSION['profile'] = $result[0]['profile'];
                 header("LOCATION: ../dashboard.php");
                }
                else{
                    ?>
                    <script>
                        alert("Can't Login Try After Sometimes");
                        window.location.href = "../index.php";
                    </script>
                    <?php
                }   
            }
            else{
                ?>
                    <script>
                        alert("Email OR PAssword IS Invalid");
                        window.location.href = "../index.php";
                    </script>
                    <?php
            }
        }
        else{
            ?>
                    <script>
                        alert("Email OR PAssword IS Invalid");
                        window.location.href = "index.php";
                    </script>
                    <?php
        }
    }
    else{
        ?>
                    <script>
                        alert(<?=$error?>);
                        window.location.href = "index.php";
                    </script>
                    <?php
    }
}
        
        
        ?>