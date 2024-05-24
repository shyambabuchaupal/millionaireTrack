<?php
require 'sidebar.php';
$queryDirectIncomes= "SELECT * FROM courses";
$details = sqlSelector($queryDirectIncomes);
?>

<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

<div class="row g-2">
    <!--end col-->

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-4">
        <div class="tab-content rounded-0 shadow-0" id="pills-tabContent">
            <div class="tab-pane fade show active" id="days7" role="tabpanel" aria-labelledby="all-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0" id = "mytable">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">Package ID</th>
                                <!-- <th class="border-bottom"></th> -->
                                <th class="border-bottom">Course Name</th>
                                <th class="border-bottom">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                               foreach($details as $data){
                                $c++;
                                   echo '<tr>';
                                   echo '<td>'.$c.'</td>';
                                   echo '<td>'.$data['package_id'].'</td>';
                                //    echo '<td>'.$data['Package_name'].'</td>';
                                   echo '<td>'.$data['course_name'].'</td>';
                                
                                   echo '<td><a class= "btn btn-info">Edit<a>
                                   <a class="btn btn-danger">Delete<a>
                                    </td>';
                                   echo '</tr>';
                               }
                               ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <div>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-left"></i></a>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-right"></i></a>
                    </div>

                    <span class="text-muted me-3">Showing 1 - 10 out of 45</span>
                </div>
            </div>


        </div>
    </div>
    <!--end col-->
</div>
<?php
require 'footer.php';
?>