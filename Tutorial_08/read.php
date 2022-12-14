<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM Posts WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve individual field value
                $title = $row["title"];
                $content = $row["content"];
                $is_published = $row["is_published"];
                $created_datetime = $row["created_datetime"];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <card class="card mt-3">
                    <div class="card-title p-2 bg-light rounded">
                        <h4 class="">Post Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5><?php echo $title; ?></h5>
                        </div>
                        <div class="mb-3 ">
                            <?php echo "<i>" . ($is_published) ? "Published </i>" : "Unpublished </i>";
echo "<span> at " . $created_datetime . "</span>"; ?>
                        </div>
                        <div class="mb-3">
                            <p><?php echo $row["content"]; ?></p>
                        </div>
                        <p><a href="index.php" class="btn btn-secondary">Back</a></p>
                    </div>
                </card>
            </div>
        </div>
    </div>
</div>