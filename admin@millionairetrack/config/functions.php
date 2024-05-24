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
   function fileValid($file_array){
       	$file_extensions = ['png', 'jpg', 'jpeg'];
$file_size = 1048576; //1 mb, 1024 * 1024
	$file_name = $file_array['name'];
	$file_type = $file_array['type'];
	$file_tem_name = $file_array['tmp_name'];
	$file_error = $file_array['error'];
	$file_size_get = $file_array['size']; // this is in bytes, 1mb = 10,000,00 bytes
	//file extensions here
	$file_name_exs = explode('.', $file_name);
	$file_exs = strtolower(end($file_name_exs)); 
	//validation start
	if(!$file_error){
			if(in_array($file_exs, $file_extensions)) {
					if($file_size_get <= $file_size){
						return true;	
					}else{
						return false;
					}
			}else{
				return false;
			}
	}else{
		return false;
	}
   }
?>
