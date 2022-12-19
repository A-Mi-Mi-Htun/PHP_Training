<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<?php
error_reporting(0);
$folder_err = "";
$image_err = "";
?>
<table class="data-table">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <tr>
            <td colspan="2"><h3 class="ttl">Tutorial_06</h3></td>
        </tr>
        <tr>
            <td class="align-label"><label class="txt" for="folder">Folder Name: </label></td>
            <td>
                <input type="text" name="folder" class="input-txt" value="<?php echo $folder; ?>">
                <p class="message"><?php echo $folder_err; ?></p>
            </td>
        </tr>
        <tr>
            <td class="align-label"><label class="txt" for="image">Image: </label></td>
            <td>
                <input class="" type="file" name="image" value="">
                <p class="message"><?php echo $image_err; ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn" type="submit" name="submit">Upload</button></td>
        </tr>
    </form>
</table>
<?php
include "show.php"
?>
