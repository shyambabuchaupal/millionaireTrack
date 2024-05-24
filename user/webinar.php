<?php
require 'sidebar.php';
?>
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-6 mt-4">
        <div class="card blog blog-primary rounded border-0 shadow overflow-hidden">
            <div class="position-relative">
                <img src="assets/images/blog/01.jpg" class="card-img-top" alt="...">
                <div class="overlay rounded-top"></div>
            </div>
            <div class="card-body content">
                <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                <div class="post-meta d-flex justify-content-between mt-3">
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                    </ul>
                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                </div>
            </div>
            <div class="author">
                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

<div class="row">
    <!-- PAGINATION START -->
    <div class="col-12 mt-4">
        <ul class="pagination justify-content-center mb-0">
            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Prev</a></li>
            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next</a></li>
        </ul>
    </div>
    <!--end col-->
    <!-- PAGINATION END -->
</div>
<!--end row-->
</main>
</div>
<?php
require 'footer.php';
?>