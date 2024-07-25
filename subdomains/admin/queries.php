<h1 style="text-align: center;">

    <?php
    require_once "../../config/database.php";

    if (isset($_POST['submit'])) {
        $sql .= "UPDATE `school_position` SET `position_number` = '7' WHERE `school_position`.`position_id` = 12;";
        $sql .= "INSERT INTO `school_position` (`position_id`, `position_name`, `position_number`) VALUES (NULL, 'Non-Staff', '8');";
        $sql .= "ALTER TABLE `applicants` ADD `registration_id` VARCHAR(16) NOT NULL AFTER `timestamp`;";
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