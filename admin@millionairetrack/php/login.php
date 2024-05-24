<?php
session_start();
require '../config/functions.php';
$error = [];
if (isset($_POST['loginUser'])) {
    $email =filterData($_POST['email']);
    $password = filterData($_POST['password']);
    $emailValid = explode('@', $email);
    if (!isset($email)) {
        $error[] = "Invalid Email Address";
    }
    if (!isset($password)) {
        $error[] = "Password Can't Be Empty";
    }
    print_r($error);
    if (empty($error)) {
        $result = sqlSelector('SELECT `userId`,`password`,`profile` FROM admin WHERE userId =?', 's',$email);
        $user_id = $result[0]['userId'];
        $row = count($result);
        if($row>0){
            $pass = $result[0]['password'];
            if($password === $pass){
                    $_SESSION['user'] = $email;
                    $_SESSION['profile'] = $result[0]['profile'];
                 header("LOCATION: ../dashboard.php");
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