<?php
require '../config/functions.php';
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
if(isset($_POST['insertCourse'])){
        $name = filterData($_POST['name']);
    $packageId = filterData($_POST['packageId']);
    if(fileValid($_FILES['course'])){
    $_FILES['course']['tmp_name'];
    $img = file_get_contents($_FILES['course']['tmp_name']);
    $fileName = 'Package'.time().'.png';
        $updateDetails = "INSERT INTO `courses` SET `image`=?,`package_id`=?,`course_name`=?";
    $updateRes = sqlInsert($updateDetails,'sss',$fileName,$packageId,$name);
        if($updateRes){
        die('success=Course Added');
    }
    else{
        die('error=Something Went Wrong');
    }
    }else{
        die('error=File Size');
    }
}
if(isset($_POST['insertCourseVideo'])){
    $title = filterData($_POST['title']);
    $videoLink = filterData($_POST['videoLink']);
    $course = filterData($_POST['course']);
    $updateDetails = "INSERT INTO `course-video` SET `course_id`=?,`video`=?,`title`=?";
    $updateRes = sqlInsert($updateDetails,'sss',$course,$videoLink,$title);
    if($updateRes){
        die('success=Course Video Added');
    }
    else{
        die('error=Something Went Wrong');
    }

}
if(isset($_POST['insertCertificate'])){
    $courseId = filterData($_POST['courseId']);
    $question1 = filterData($_POST['question1']);
    $question2 = filterData($_POST['question2']);
    $question3 = filterData($_POST['question3']);
    $question4 = filterData($_POST['question4']);
    $question5 = filterData($_POST['question5']);
    $choice1 = json_encode(array(filterData($_POST['choice1'][0]),filterData($_POST['choice1'][1]),filterData($_POST['choice1'][2]),filterData($_POST['choice1'][3])));
    $choice2 = json_encode(array(filterData($_POST['choice2'][0]),filterData($_POST['choice2'][1]),filterData($_POST['choice2'][2]),filterData($_POST['choice2'][3])));
    $choice3 = json_encode(array(filterData($_POST['choice3'][0]),filterData($_POST['choice3'][1]),filterData($_POST['choice3'][2]),filterData($_POST['choice3'][3])));
    $choice4 = json_encode(array(filterData($_POST['choice4'][0]),filterData($_POST['choice4'][1]),filterData($_POST['choice4'][2]),filterData($_POST['choice4'][3])));
    $choice5 = json_encode(array(filterData($_POST['choice5'][0]),filterData($_POST['choice5'][1]),filterData($_POST['choice5'][2]),filterData($_POST['choice5'][3])));
    $answer1 = filterData($_POST['answer1']);
    $answer2 = filterData($_POST['answer2']);
    $answer3 = filterData($_POST['answer3']);
    $answer4 = filterData($_POST['answer4']);
    $answer5 = filterData($_POST['answer5']);

    $updateDetails = "INSERT INTO `certificate`(`courseId`, `question1`, `choice1`, `question2`, `choice2`, `question3`, `choice3`, `question4`, `choice4`, `question5`, `choice5`, `answer1`, `answer2`, `answer3`, `answer4`,`answer5`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $updateRes = sqlInsert($updateDetails,'ssssssssssssssss',$courseId,$question1,$question2,$question3,$question4,$question5,$choice1,$choice2,$choice3,$choice4,$choice5,$answer1,$answer2,$answer3,$answer4,$answer5);
    if($updateRes){
        die('success=Certificate Added');
    }
    else{
        die('error=Something Went Wrong');
    }

}
?>