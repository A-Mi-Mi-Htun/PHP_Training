<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<table class="qr-table">
    <form method="post" action="">
        <tr>
            <td colspan="2"><h3 class="ttl">Let's create QR code.</h3></td>
        </tr>
        <tr>
            <td><label class="txt" for="qr">Text: </label></td>
            <td><input class="input-txt" type="text" name="qr_text"></td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn" type="submit" name="submit">Create</button></td>
        </tr>
    </form>
</table>
<div class="qr-image">
<?php
require_once("library/phpqrcode-git/lib/full/qrlib.php");
if (isset($_POST["submit"])) {
    $text = $_POST["qr_text"];

    $save_txt = "generate/qr1.png";
    $pixel_size = 30;
    $frame_size = 10;
    
    QRcode::png($text, $save_txt, $pixel_size, $frame_size);
    echo "<img src='generate/qr1.png'>";
}
?>
</div>