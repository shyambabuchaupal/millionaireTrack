<?php
require 'config.php';
$GLOBALS['conn'] = mysqli_connect(HOST,USER,Password,DATABASE);

function sqlSelector($query, $formate = false, ...$vars){
$stmt = mysqli_stmt_init($GLOBALS['conn']);
$result = [];
mysqli_stmt_prepare($stmt,$query);
if($formate){
   mysqli_stmt_bind_param($stmt,$formate,...$vars);
}
if(mysqli_stmt_execute($stmt)){
   $results = mysqli_stmt_get_result($stmt);
   foreach($results as $data){
       $result[] = $data;
   }
   mysqli_stmt_close($stmt);
   return $result;
}
else{
   mysqli_stmt_close($stmt);
   return false;
}
}

function sqlInsert($query, $formate = false, ...$vars){
$stmt = mysqli_stmt_init($GLOBALS['conn']);
mysqli_stmt_prepare($stmt,$query);
if($formate){
   mysqli_stmt_bind_param($stmt,$formate,...$vars);
}
if(mysqli_stmt_execute($stmt)){
   $result = mysqli_stmt_insert_id($stmt);
   mysqli_stmt_close($stmt);
   return $result;
}
else{
    echo mysqli_stmt_error($stmt);
   mysqli_stmt_close($stmt);
   return false;
}
}

function sqlUpdate($query, $formate = false, ...$vars){
   $stmt = mysqli_stmt_init($GLOBALS['conn']);
   mysqli_stmt_prepare($stmt,$query);
   if($formate){
      mysqli_stmt_bind_param($stmt,$formate,...$vars);
   }
   if(mysqli_stmt_execute($stmt)){
      $result = mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      return $result;
   }
   else{
       echo mysqli_stmt_error($stmt);
      mysqli_stmt_close($stmt);
      return false;
   }
   }
   function filterData($data){
      $data = mysqli_real_escape_string($GLOBALS['conn'],$data);
        $data = htmlspecialchars($data);
        $data = trim($data);
        return $data;
   }
?>
