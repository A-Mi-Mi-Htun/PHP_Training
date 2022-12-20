<?php
require_once "config.php";

// Define variables and initialize with empty values
$is_published = "";
$ttl_err = $content_err = $published_err = "";
$id = 0;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM posts WHERE id = $id";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = $row["title"];
                $content = $row["content"];
            }

        } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    }
}

if (isset($_POST["submit"])) {
    $id = $_GET["id"];

    $post_title = $_POST["title"];
    
    $post_content = $_POST["content"];

    if (empty($_POST["is_published"])) {
        $post_published = "0";
    } else {
        $post_published = "1";
    }

    $sql = "UPDATE posts SET title = '$post_title', content = '$post_content', is_published = $post_published WHERE id = $id";
    $conn->query($sql);
    header("location:index.php");
}
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<div class="wrapper w-50 mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <card class="card mt-3">
                    <div class="card-title p-2 bg-light rounded">
                        <h4 class="">Edit Post</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
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
                                <input type="checkbox" name="is_published" value="0">
                                <label>Publish</label>
                            </div>
                            <div class="mb-3">
                                <a href="index.php" class="btn pull-left btn-secondary">Back</a>
                                <input type="submit" name="submit" class="btn pull-right btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </card>
            </div>
        </div>
    </div>
</div>