<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<div class="image-box">
<?php
$folder = "";
$folder_err = "";
$image_err = "";

$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];

$directory = $_POST['folder'];
mkdir($directory);

$file_path = $directory . "/" . $file_name;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_folder = trim($_POST["folder"]);
    if (empty($input_folder)) {
        $folder_err = "Please select a folder.";
    } elseif (!filter_var($input_folder, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $folder_err = "Please type a valid folder name.";
    } else {
        $folder = $input_folder;
    }

    if (!empty($file_name)) {
        $allowed = array("gif", "jpg", "jpeg", "png");
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (($file_size < 2000000) && (in_array($ext, $allowed))) {
            move_uploaded_file($file_tmp, $file_path);
        } else {
            $image_err = "Invalid file type";
        }
    } else {
        $image_err = "Please select an image";
    }
}

$images = [];
$main_paths = scandir(__DIR__);
unset($main_paths[0], $main_paths[1]);
foreach ($main_paths as $main_path) {
    if (dir($main_path)) {
        $child_paths = scandir($main_path);
        unset($child_paths[0], $child_paths[1]);
        foreach ($child_paths as $child_path) {
            if ($main_path == "css") {
                echo "";
            } else {
                $images[] = $main_path . "/" . $child_path;
            }
        }
    }
}
foreach ($images as $image) {
    echo '<div class="img-info">';
    echo '<img class="img-file" src="' . $image . '" />';
    echo "<button class='del-btn'><a class='btn-txt' href='delete.php?id=$image'>Delete</a></button>";
    echo "</div>";
}
?>
</div>