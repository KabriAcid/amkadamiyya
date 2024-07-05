<?php
session_start();
include "../../config/database.php";


if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $sql = "SELECT * FROM `uploads` WHERE `student_id` = '$student_id'";
    $uploads_res = mysqli_query($conn, $sql);
    $uploads = mysqli_fetch_assoc( $uploads_res );
    $student_id = $uploads["student_id"];

    // Retrieve student details using a prepared statement
    $sql_student = "SELECT * FROM `students` WHERE `student_id` = ?";
    $stmt_student = mysqli_prepare($conn, $sql_student);
    mysqli_stmt_bind_param($stmt_student, "i", $student_id);
    mysqli_stmt_execute($stmt_student);
    $result_student = mysqli_stmt_get_result($stmt_student);
    $student = mysqli_fetch_assoc($result_student);
    mysqli_stmt_close($stmt_student);

    $section_id = $student['section_id'];
    $section_name = "";
    if ($section_id == 1) {
        $section_name = "Nursery Section";
    } else if ($section_id == 2 || $section_id == 3) {
        $section_name = "Primary Section";
    } else if ($section_id >= 4) {
        $section_name = "Secondary Section";
    }
    // Retrieve default settings
    $sql = "SELECT * FROM `defaults`";
    $result = mysqli_query($conn, $sql);
    $default = mysqli_fetch_assoc($result);

    function addOrdinalSuffix($num) {
        if (!in_array(($num % 100), array(11, 12, 13))){
            switch ($num % 10) {
                case 1: return $num.'<sup>st</sup>';
                case 2: return $num.'<sup>nd</sup>';
                case 3: return $num.'<sup>rd</sup>';
            }
        }
        return $num.'<sup>th</sup>';
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Result</title>
    <?php include "inc/admin-header.php"; ?>
    <link rel="stylesheet" href="../../css/print.css" media="print">
    
</head>

<body class="g-sidenav-show bg-info-soft">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid">
            <!-- Header -->
            <div class="container-fluid p-2">
                <div class="header-box text-center">
                    <h4 class="text-uppercase mb-0 font-weight-bolder">amkadamiyya school jalingo</h4>
                    <h6 class="text-transform-capitalize mb-0">Samunaka Junction Jalingo, Taraba State</h6>
                    <h6 class="text-uppercase mb-0">terminal report sheet</h6>
                    <h6 class="text-uppercase mb-n2"><?php echo $section_name; ?></h6>
                </div>
            </div>
            <!-- Info box -->
            <div class="container-fluid mt-3 border p-2">
                <div class="info-box">
                    <!-- Row I -->
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <span class="text-secondary">Name:&nbsp;</span>
                            <span
                                class="font-weight-bold"><?php echo $student['first_name'] . " " . $student['second_name'] . " " . $student['last_name']; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 text-end">
                            <span class="text-secondary">Position:&nbsp;</span><span
                                class="font-weight-bold"><?php echo addOrdinalSuffix($uploads['position']);?></span>
                        </div>
                    </div>
                    <!-- Row II -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4 py-1 text-left">
                            <span class="text-secondary">Gender:&nbsp;</span><span
                                class="font-weight-bold"><?php echo $student['gender']; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 py-1 text-center">
                            <span class="text-secondary">Class:&nbsp;</span><span class="font-weight-bold">
                                <?php
                                $c_id = $student['class_id'];
                                $sql = "SELECT * FROM classes WHERE class_id = '$c_id'";
                                $c_res = mysqli_query($conn, $sql);
                                $c_row = mysqli_fetch_assoc($c_res);
                                echo $c_row['class_name'];
                                ?>
                            </span>
                        </div>
                        <div class="col-md-4 col-sm-4 py-1 text-end">
                            <span class="text-secondary">No in Class:&nbsp;</span>
                            <span class="font-weight-bold">
                                <?php
                                $class_id = $student['class_id'];
                                $sql = "SELECT COUNT(*) AS `total_number` FROM `students` WHERE `class_id` = ?";
                                $stmt_class = mysqli_prepare($conn, $sql);
                                mysqli_stmt_bind_param($stmt_class, "i", $class_id);
                                mysqli_stmt_execute($stmt_class);
                                $result_class = mysqli_stmt_get_result($stmt_class);
                                $class_count = mysqli_fetch_assoc($result_class);
                                echo $class_count['total_number'];
                                mysqli_stmt_close($stmt_class);
                                ?>
                            </span>
                        </div>
                    </div>
                    <!-- Row III -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4 py-1 text-left">
                            <span class="text-secondary">State:&nbsp;</span><span
                                class="font-weight-bold"><?php echo $student['state']; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 py-1 text-center">
                            <span class="text-secondary">LGA:&nbsp;</span><span
                                class="font-weight-bold"><?php echo $student['lga']; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 py-1 text-end">
                            <span class="text-secondary">Term:&nbsp;</span><span
                                class="font-weight-bold"><?php echo $default['current_term']; ?></span>
                        </div>

                    </div>
                    <!-- Row IV -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4 py-1 text-left">
                            <span class="text-secondary">Session:&nbsp;</span><span
                                class="font-weight-bold"><?php echo $default['session_name']; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 py-1 text-center">
                            <span class="text-secondary">Term Ended:&nbsp;</span><span
                                class="font-weight-bold"><?php echo $default['term_ending']; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 py-1 text-end">
                            <span class="text-secondary">Next Term Begins:&nbsp;</span><span
                                class="font-weight-bold"><?php echo $default['term_begins']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cognitive Domain -->
            <div class="container-fluid">
                <h6 class="mt-2 font-weight-bolder text-sm text-secondary">Cognitive Domain</h6>
            </div>
            <!-- Results Data -->
            <div class="container-fluid">
                <table class="table table-responsive ">
                    <thead>
                        <tr>
                            <th class="text-uppercase px-0 text-center text-xxs font-weight-bolder border">
                                S/N</th>
                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                subject</th>
                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                1<sup>st</sup>&nbsp;c.a</th>
                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                2<sup>nd</sup>&nbsp;c.a</th>
                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                exams</th>
                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                total</th>
                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                grade</th>
                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Retrieve results using a prepared statement
                        $sql = "SELECT * FROM `results` WHERE `student_id` = ?";
                        $stmt_results = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt_results, "i", $student_id);
                        mysqli_stmt_execute($stmt_results);
                        $result_results = mysqli_stmt_get_result($stmt_results);

                        $count = 1;
                        while ($res = mysqli_fetch_assoc($result_results)) {
                            ?>
                            <tr>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php echo $count; ?>
                                </td>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php
                                    $subject_id = $res['subject_id'];
                                    // Retrieve subject name using a prepared statement
                                    $sql_subject = "SELECT * FROM `subjects` WHERE `subject_id` = ?";
                                    $stmt_subject = mysqli_prepare($conn, $sql_subject);
                                    mysqli_stmt_bind_param($stmt_subject, "i", $subject_id);
                                    mysqli_stmt_execute($stmt_subject);
                                    $result_subject = mysqli_stmt_get_result($stmt_subject);
                                    $subject = mysqli_fetch_assoc($result_subject);
                                    echo $subject['subject_name'];
                                    mysqli_stmt_close($stmt_subject);
                                    ?>
                                </td>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php echo $res['first_test']; ?>
                                </td>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php echo $res['second_test']; ?>
                                </td>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php echo $res['exam']; ?>
                                </td>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php echo $res['total']; ?>
                                </td>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php echo $res['grade']; ?>
                                </td>
                                <td class="text-sm text-center font-weight-normal border">
                                    <?php echo $res['remark']; ?>
                                </td>
                            </tr>
                            <?php
                            $count++;
                        }
                        mysqli_stmt_close($stmt_results);
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-end font-weight-bolder border">Grand Total: <?php echo $uploads['grand_total']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-end font-weight-bolder border">Average:
                            <?php echo $uploads['average'];?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Attendance and Grade Details -->
            <!-- ... -->
            <div class="container-fluid p-2 mt-3">
                <div class="row">
                    <div class="col-8">
                        <table class="table table-responsive" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th class="border p-2 text-left">Psychomotor Skills</th>
                                    <th class="border p-2 text-center">A</th>
                                    <th class="border p-2 text-center">B</th>
                                    <th class="border p-2 text-center">C</th>
                                    <th class="border p-2 text-center">D</th>
                                    <th class="border p-2 text-center">F</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-2">Attendance</td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                </tr>
                                <tr>
                                    <td class="border p-2">Punctuality</td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                </tr>
                                <tr>
                                    <td class="border p-2">Attentiveness</td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                </tr>
                                <tr>
                                    <td class="border p-2">Neatness</td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                    <td class="border p-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <table class="table table-responsive border" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th class="text-center border p-1" colspan="2">Grade Details</th>
                                </tr>
                                <tr>
                                    <th class="border text-center p-1">Marks</th>
                                    <th class="border text-center p-1">Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border text-center p-1">70 - 100</td>
                                    <td class="border text-center p-1">A</td>
                                </tr>
                                <tr>
                                    <td class="border text-center p-1">60 - 69</td>
                                    <td class="border text-center p-1">B</td>
                                </tr>
                                <tr>
                                    <td class="border text-center p-1">50 - 59</td>
                                    <td class="border text-center p-1">C</td>
                                </tr>
                                <tr>
                                    <td class="border text-center p-1">40 - 49</td>
                                    <td class="border text-center p-1">D</td>
                                </tr>
                                <tr>
                                    <td class="border text-center p-1">00 - 39</td>
                                    <td class="border text-center p-1">F</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php

            $average = $uploads['average'];
            // Function to generate comments based on average score
            function generateComment($average)
            {
                switch (true) {
                    case ($average >= 70 && $average <= 100):
                        return "Excellent performance. Keep it up!";
                    case ($average >= 60 && $average < 70):
                        return "Very good performance. Try harder next time!";
                    case ($average >= 50 && $average < 60):
                        return "Good performance. Keep striving to improve!";
                    case ($average >= 40 && $average < 50):
                        return "Fair performance. There is chance for improvement.";
                    case ($average <= 39):
                        return "Poor performance. Improve at your weak areas.";
                }
            }

            // Get the comment for the student's performance
            $comment = generateComment($average);

            // Function to generate principal's remark based on average score
            function generatePrincipalRemark($average)
            {
                switch (true) {
                    case ($average >= 70 && $average <= 100):
                        return "Outstanding performance. Maintain this high standard.";
                    case ($average >= 60 && $average < 70):
                        return "Very commendable effort. Keep up the good work.";
                    case ($average >= 50 && $average < 60):
                        return "Good performance. Strive for higher achievement.";
                    case ($average >= 40 && $average < 50):
                        return "Satisfactory. Focus on areas needing improvement.";
                    case ($average <= 39):
                        return "Performance requires significant improvement. Dedicate more effort.";
                }
            }

            // Get the principal's remark for the student's performance
            $principalRemark = generatePrincipalRemark($average);

            ?>
            <!-- Comments -->
            <div class="container-fluid">
                <div class="mb-2">
                    <div>
                        <span class="text-sm">Form Master&apos;s Comment: </span><span class="font-weight-bold"><?php echo $comment; ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <?php
                            $class_id = $student['class_id'];
                            $sql = "SELECT * FROM `staff` WHERE `class_id` = '$class_id'";
                            $result_staff = mysqli_query($conn, $sql);
                            $staff = mysqli_fetch_assoc( $result_staff );
                        ?>
                        <span>Name: <span class="dancingScript"><?php echo $staff['first_name'] . ' ' . $staff['last_name'];?></span></span>
                        <span class="align-self-start">Signature ....................................</span>
                    </div>
                </div>
                <div class="mb-2">
                    <div>
                        <span class="text-sm">Principal&apos;s Remark: </span><span class="font-weight-bold"><?php echo $principalRemark; ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Name: <span class="dancingScript">Umar Bakari Yahya</span></span>
                        <span class="align-self-start">Signature ....................................</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <div class="d-flex justify-content-center">
                <button class="btn bg-gradient-success" onclick="window.print();">print</button>
            </div>
        </div>
    </main>

    <?php include "inc/admin-scripts.php"; ?>
</body>

</html>


</html>