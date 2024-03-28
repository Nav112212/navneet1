<?php
require_once "config.php";

$id = $_GET["id"] ?? null;

if (!isset($id) || empty($id)) {
    header("location: error.php");
    exit();
}

$sql = "SELECT * FROM employees WHERE id = ?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    $param_id = $id;
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $name = $row["name"];
            $address = $row["address"];
            $salary = $row["salary"];
        } else {
            header("location: error.php");
            exit();
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
mysqli_stmt_close($stmt);
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employee Record</title>
    <link rel="stylesheet" href="php.css">

</head>
<body>
    <section id="main">
        <div class="container">
            <h2>View Employee Record</h2>
            <div class="record">
                <div class="field">
                    <label>Name:</label>
                    <span><?php echo $name; ?></span>
                </div>
                <div class="field">
                    <label>Address:</label>
                    <span><?php echo $address; ?></span>
                </div>
                <div class="field">
                    <label>Salary:</label>
                    <span><?php echo $salary; ?></span>
                </div>
            </div>
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    </section>

    <footer>
    <p>&copy; Made by Navneet_Assignment_2</p>
        </footer>
</body>
</html>
