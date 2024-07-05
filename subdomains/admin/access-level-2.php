    <?php
    if(isset($_SESSION['staff']
)){
        $class_id = $_SESSION['staff']
['class_id'];
        $subject_id = $_SESSION['staff']
['subject_id'];
    }
?>
<div class="container-fluid pt-3">
    <div class="row removable">
        <div class="col-xl-4 col-sm-6">
            <div class="card mb-3 mb-xl-0">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Students</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS `total_students` FROM `students` WHERE `class_id` = '$class_id'; ";
                                    $total = mysqli_query($conn, $sql);
                                    $students = mysqli_fetch_assoc($total);
                                    ?>
                                    <?php echo $students['total_students']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Uploaded Subjects</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php
                                    $sql = "SELECT COUNT(DISTINCT subject_id) AS `totaL_upload` FROM `results` WHERE `class_id` = '$class_id' ";
                                    $total = mysqli_query($conn, $sql);
                                    $results = mysqli_fetch_assoc($total);
                                    ?>
                                    <?php echo $results['totaL_upload']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-cloud-upload-96 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card mb-3 mb-xl-0">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Form Master</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php
                                    $sql = "SELECT `class_name` FROM `classes` WHERE `class_id` = '$class_id'"; 
                                    $total = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($total);
                                    ?>
                                    <?php echo $row['class_name']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-square-pin text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include students table -->
<?php  include "inc/student-table.php"; ?>