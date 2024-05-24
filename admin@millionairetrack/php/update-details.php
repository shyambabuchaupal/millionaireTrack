<?php
require '../config/functions.php';
if(isset($_POST['updatePackage'])){
    $id = filterData($_POST['packageId']);
    $name = filterData($_POST['name']);
    $price = filterData($_POST['price']);
    $direct = filterData($_POST['direct']);
    $passive = filterData($_POST['passive']);
    if($_FILES['package']['error']==0){
        $img = file_get_contents($_FILES['package']['tmp_name']);
        $fileName = 'Package'.time().'.png';
        file_put_contents('../images/'.$fileName,$img);
        $updateDetails = "UPDATE `package` SET `Package_name`=?,`Package_price`=?,`Package_image`=?,`Direct`=?,`passive`=? where `Package_id` = '$id'";
        $updateRes = sqlUpdate($updateDetails,'sssss',$name,$price,$fileName,$direct,$passive);
    }
    else{
        $updateDetails = "UPDATE `package` SET `Package_name`=?,`Package_price`=?,`Direct`=?,`passive`=? WHERE `Package_id` = $id";
        $updateRes = sqlUpdate($updateDetails,'ssss',$name,$price,$direct,$passive);
    }
    if($updateRes>0){
        die('success=Package Updated');
    }
    else{
        die('error=Something Went Wrong');
    }

}
if(isset($_POST['updateCourse'])){
    $id = filterData($_POST['courseId']);
    $name = filterData($_POST['name']);
    $packageId = filterData($_POST['packageId']);
    if($_FILES['course']['error']==0){
        $img = file_get_contents($_FILES['course']['tmp_name']);
        $fileName = 'course'.time().'.png';
        file_put_contents('../images/'.$fileName,$img);
        $updateDetails = "UPDATE `courses` SET `image`=?,`package_id`=?,`course_name`=? WHERE `id` = '$id'";
        $updateRes = sqlUpdate($updateDetails,'sss',$fileName,$packageId,$name);
    }
    else{
        $updateDetails = "UPDATE `courses` SET`package_id`=?,`course_name`=? WHERE `id` = '$id'";
        $updateRes = sqlUpdate($updateDetails,'ss',$packageId,$name);
    }
    if($updateRes>0){
        header('Location:../all-course.php');
    }
    else{
        die('error=Something Went Wrong');
    }

}
?>