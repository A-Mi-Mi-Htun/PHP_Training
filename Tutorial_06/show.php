<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<div class="image-box">
<?php
$folder = "";
$folder_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_folder = trim($_POST["folder"]);
    if (empty($input_folder)) {
        $folder_err = "Please select a folder.";
    } elseif (!filter_var($input_folder, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $folder_err = "Please type a valid folder name.";
    } else {
        $folder = $input_folder;
    }

    if (isset($_FILES["image"])) {
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($file_info, $file_tmp);

        if ($file_type != "image/jpeg" || $file_type != "image/jpg" || $file_type != "image/png") {
            echo "This is not an image";
        }

        if ($file_size > 2000000) {
            echo "File size must be excately 2MB";
        }
    }
}

$directory = $_POST['folder'];
mkdir($directory);

$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];

$file_path = $directory . "/" . $file_name;
move_uploaded_file($file_tmp, $file_path);

$images = [];
$main_paths = scandir(__DIR__);
unset($main_paths[0], $main_paths[1]);
foreach ($main_paths as $main_path) {
    if (dir($main_path)) {
        $child_paths = scandir($main_path);
        unset($child_paths[0], $child_paths[1]);
        foreach ($child_paths as $child_path) {
            $images[] = $main_path . "/" . $child_path;
        }
    }
}

unset($images[0], $images[1]);
foreach ($images as $image) {
    echo '<div class="img-info">';
    echo '<img class="img-file" src="' . $image . '" />';
    echo "<button class='del-btn'><a class='btn-txt' href='delete.php?id=$image'>Delete</a></button>";
    echo "</div>";
}
?>
</div>