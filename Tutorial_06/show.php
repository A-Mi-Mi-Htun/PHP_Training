<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<div class="image-box">
    <?php
        //error_reporting(0);

        if(isset($_POST['submit'])) {

            if(empty($_POST["folder"])) {

                $msg_folder = "Please select folder name";

            } 
            
            if (empty($_FILES["image"])) {

                $msg_image = "Please select file";

            } 
   
            if (isset($_FILES["image"])) {
                
                $directory = $_POST['folder'];
                mkdir($directory);
    
                $errors = array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                
                if ($file_size > 2000000) {
                    $errors[] = "File size must be excately 2MB";
                }
                
                if (empty($errors) == true) {
                    $file_path = $directory . "/" . $file_name;
                    move_uploaded_file($file_tmp, $file_path);
                
                    $dirname = $directory . "/";
                    $images = glob($dirname . "*");

                    foreach ($images as $image) {
                        echo '<div class="img-info">';
                        echo '<img class="img-file" src="' . $image . '" />';
                        $image_path = $image;
                        //echo $image_path;
                        echo "<button class='del-btn'><a class='btn-txt' href='delete.php?id=$image_path'>Delete</a></button>";
                        echo "</div>";
                    }            
                } else {
                    print_r($errors);
                }
                
                
            }           
        } 
    ?>   
</div>

