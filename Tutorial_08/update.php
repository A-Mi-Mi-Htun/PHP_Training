<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$title = $content = $is_published = "";
$ttl_err = $content_err = $published_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_ttl = trim($_POST["title"]);
    if (empty($input_ttl)) {
        $ttl_err = "Please enter a title.";
    } elseif (!filter_var($input_ttl, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $ttl_err = "Please enter a valid title.";
    } else {
        $title = $input_ttl;
    }

    // Validate content
    $input_content = trim($_POST["content"]);
    if (empty($input_content)) {
        $content_err = "Please enter an content.";
    } else {
        $content = $input_content;
    }

    $input_published = trim($_POST["is_published"]);
    if (empty($input_published)) {
        $is_published = false;
    } else {
        $is_published = true;
    }

    // Check input errors before inserting in database
    if (empty($ttl_err) && empty($content_err)) {
        // Prepare an update statement
        $sql = "UPDATE Posts SET title = ?, content = ?, is_published = ? WHERE id = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $param_title, $param_content, $param_published, $param_id);

            // Set parameters
            $param_title = $title;
            $param_content = $content;
            $param_published = $is_published;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM Posts WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);

            // Set parameters
            $param_id = $id;

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
                } else {
                    // URL doesn't contain valid id. Redirect to error page
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
                        <h4 class="">Edit Post</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control <?php echo (!empty($ttl_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>">
                                <span class="invalid-feedback"><?php echo $ttl_err; ?></span>
                            </div>
                            <div class="form-group mb-3">
                                <label>Content</label>
                                <textarea name="content" class="form-control <?php echo (!empty($content_err)) ? 'is-invalid' : ''; ?>"><?php echo $content; ?></textarea>
                                <span class="invalid-feedback"><?php echo $content_err; ?></span>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="is_published" class=""></input>
                                <label>Publish</label>
                            </div>
                            <div class="mb-3">
                                <a href="index.php" class="btn pull-left btn-secondary">Back</a>
                                <input type="submit" class="btn pull-right btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </card>
            </div>
        </div>
    </div>
</div>