<?php
require 'sidebar.php';
$courseId = filterData($_GET['course']);
$sql = "SELECT `id`, `course_id`, `video`,`title` FROM `course-video` WHERE md5(`course_id`) = '".$courseId."'";
$videoData = sqlSelector($sql);
if(isset($_GET['lectureId'])){
    $lectureId = filterData($_GET['lectureId']);
    $lectureSql = "SELECT `video` FROM `course-video` WHERE `id` = ?";
    $videoData1 = sqlSelector($lectureSql,'s',$lectureId);
    $videoLink = explode('/',$videoData1[0]['video']);
}else{
    $lectureId = $videoData[0]['video'];
    $videoLink = explode('/',$lectureId);
}
?>
<style>
    .lecture{
    border: 5px solid #fcb300d6;
    background: #fcb300d6;
    border-radius: 10px;
}
.lecture-heading{
    display: block;
    background: #fcb300d6;
    padding: 10px;
}
.lecture-name{
    display: block;
    background: #fff;
    color: #2f55d4;
    padding: 5px 10px;
}
</style>
<div class = "row">
    <div class = "col-md-6">\
    <?php
    ?>
        <iframe width="420" height="315"
src="https://player.vimeo.com/video/<?=$videoLink[3]?>?h=<?=$videoLink[4]?>">
</iframe>
    </div>
    <div class = "col-md-6">
        <div class = "lecture">
            <span class = "lecture-heading">Lecture Video</span>
        <?php
        $c = 0;
        foreach($videoData as $data){
            $c++;
            echo '<a href = "learning-courses.php?lectureId='.$data['id'].'&course='.$courseId.'"><span class = "lecture-name">'.$c." ".$data['title'].'</span></a>';
        }
        ?>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>