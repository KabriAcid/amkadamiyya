<h1 style="text-align: center;">

    <?php
    include "../../config/database.php";

    if (isset($_POST['submit'])) {
        $sql = "ALTER TABLE `blogs` CHANGE `blog_subtitle` `blog_category` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        $sql = $sql;
    }

    ?>

</h1>

<head>
    <link rel="stylesheet" href="https://classless.de/classless.css">
</head>
<body>
    <form action="" method="post" style="text-align: center;">
        <button type="submit" name="submit">Submit</button>
    </form> 
    <p style="text-align: center;"><?php echo isset($sql) ? $sql : '';?></p>
</body>