<h1 style="text-align: center;">

    <?php
    include "../../config/database.php";

    if (isset($_POST['submit'])) {
        $sql = "UPDATE alumni set graduation_year = 2024";
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