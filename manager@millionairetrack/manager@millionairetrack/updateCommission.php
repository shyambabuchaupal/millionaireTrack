<?php
require 'config/functions.php';
// $date1 = date('Y-m');
// $date2 = date('d')-12;
echo $sql = "SELECT DISTINCT`reference`.`Reff_User_id` FROM `reference` WHERE `Created_date`> '2022-12-16 00:00:00'";
$query = sqlSelector($sql);
$rows = count($query);
echo 'No Of Entry: '.$rows;
foreach($query as $data){
    $userId = $data['Reff_User_id'];
    echo'<input class = "mtid" value = "'.$userId.'">';
    echo '<br/>';
}
?>
<script>
    let mtidArray = document.getElementsByClassName('mtid');
    let i =0;
function updateComm(id){
            const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
      mtidArray[i].value = "done";
      i++;
      updateComm(mtidArray[i]);
    }
  xhttp.open("GET", "https://localhost/orginal%20project%20mt/public_html/manager@millionairetrack/updateCommissionUser.php?id="+id.value, true);
  xhttp.send();
}
updateComm(mtidArray[0]);
</script>