<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<table class="data-table">
    <form method="post" action="" enctype="multipart/form-data">
        <tr>
            <td colspan="2"><h3 class="ttl">Tutorial_06</h3></td>
        </tr>
        <tr>
            <td><label class="txt" for="folder">Folder Name: </label></td>
            <td><input class="input-txt" type="text" name="folder"></td>
        </tr>
        <tr>
            <td><label class="txt" for="image">Image: </label></td>
            <td><input class="" type="file" name="image"></td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn" type="submit" name="submit">Upload</button></td>
        </tr>
    </form>
</table>
<div class="image-box">
    <?php
        error_reporting(0);

        if(isset($_POST['submit']) && isset($_FILES['image'])) {

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
                    echo "<div class='img-info'>";
                    echo '<img class="img-file" src="' . $image . '" />';
                    $image_path = $image;
                    //echo $image_path;
                    echo "<button class='del-btn' onclick='unlink($image_path)'>Delete</button>";
                    echo "</div>";
                }
            } else {
                print_r($errors);
            }
        }

    ?>     
</div>

<script>
    function unlink(image_path) {
        console.log(image_path);
    }
</script>
