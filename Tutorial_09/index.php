<?php
require_once "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    echo '<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                        <form action="delete.php" method="post">
                            <div class="alert alert-danger mt-2">
                                <input type="hidden" name="id" value="' . $id . '" />
                                <p>Are you sure you want to delete this employee record?</p>
                                <p>
                                    <input type="submit" name="delete" value="Yes" class="btn btn-danger">
                                    <a href="index.php" class="btn btn-secondary ml-2">No</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
} 
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="library/bootstrap/dist/js/bootstrap.min.js"></script>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="create.php" class="mt-3 btn btn-primary pull-left text-white">Create</a>
                <a href="weekly.php" class="mt-3 btn btn-primary pull-left text-white">Graph</a>
                <card class="card mt-3">
                    <div class="card-title p-2 bg-light rounded">
                        <h4 class="">Post List</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        // Include config file
                        require_once "config.php";
                        
                        //Attempt select query execution
                        $sql = "SELECT * FROM posts";
                        if ($result = $conn->query($sql)) {
                            if ($result->num_rows > 0) {
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>ID</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Content</th>";
                                            echo "<th>Is Published</th>";
                                            echo "<th>Created Date</th>";
                                            echo "<th>Actions</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                            echo "<th>" . $row['id'] . "</th>";
                                            echo "<td>" . $row['title'] . "</td>";
                                            echo "<td>" . $row['content'] . "</td>";
                                            echo ($row['is_published']) ? "<td> Published </td>" : "<td> Unpublished </td>";
                                            echo "<td>" . $row['created_datetime'] . "</td>";
                                            echo "<td>";
                                                echo '<button class="btn btn-info me-3"><a href="read.php?id='. $row['id'] .'">View</a></button>';
                                                echo '<button class="btn btn-success me-3"><a href="update.php?id='. $row['id'] .'">Edit</a></button>';
                                                echo '<button class="btn btn-danger me-3"><a href="index.php?id='. $row['id'] .'">Delete</a></button>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                            } else {
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
    
                        //Close connection
                        //$conn->close($link);
                        ?>
                    </div>
                </card>
            </div>
        </div>
    </div>
</div>
<?php
require_once "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM Posts WHERE id = $id";
    $conn->query($sql);
    header("location:index.php");
}
?>