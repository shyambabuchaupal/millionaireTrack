<?php include 'sidebar.php';
?>

<!-- <link rel="stylesheet" id="font-awesome-style-css" href="response/asset/bootstrap3.min.css" type="text/css" media="all"> -->

<!-- <script type="text/javascript" charset="utf8" src="response/asset/jquery-1.11.1.min.js"></script> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="response/asset/jquery.dataTables.min.css"/> -->

<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
	 
<!-- <script type="text/javascript" src="response/asset/jquery.dataTables.min.js"></script> -->

	
	<div class="container">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-4">
            <div class="tab-content rounded-0 shadow-0">
                <div class="tab-pane fade show active" id="days7" role="tabpanel" aria-labelledby="all-tab">
                    <div class="table-responsive bg-white shadow rounded p-3">
                        <table id="employee_grid" class="table mb-0">
                            <thead>
                                <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">Payment ID</th>
                                <!-- <th class="border-bottom">Payment ID</th> -->
                                <th class="border-bottom">Method</th>
                                <th class="border-bottom">Payment Amount</th>
                                <th class="border-bottom">Email</th>
                                <th class="border-bottom">Payment Date</th>
                                <!-- <th class="border-bottom">Action</th> -->
                                </tr>
                            </thead>
                        </table>
                    </div>   
                </div>
            </div>
        </div>  
    </div>

<script type="text/javascript">
$( document ).ready(function() {
$('#employee_grid').DataTable({
				 "bProcessing": true,
         "serverSide": true,
         "ajax":{
            url :"response/response2.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#employee_grid_processing").css("display","none");
            }
          }
        });   
});
</script>
