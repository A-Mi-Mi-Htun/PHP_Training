<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<table class="data-table">
    <?php error_reporting(0); ?>
    <form method="post" action="" enctype="multipart/form-data">
        <tr>
            <td colspan="2"><h3 class="ttl">Tutorial_06</h3></td>
        </tr>
        <tr>
            <td><label class="txt" for="folder">Folder Name: </label></td>
            <td>
                <input class="input-txt" type="text" name="folder" value="<?php echo $_POST['folder']; ?>">
                <?php echo "<br><p class='message'>" . $msg_folder . "</p>"; ?>
            </td>
        </tr>
        <tr>
            <td><label class="txt" for="image">Image: </label></td>
            <td>
                <input class="" type="file" name="image" value="<?php echo $_POST['image']; ?>">
                <?php echo "<br><p class='message'>" . $msg_image . "</p>"; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn" type="submit" name="submit">Upload</button></td>
        </tr>
    </form>
</table>
<?php include("show.php") ?>

