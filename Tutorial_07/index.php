<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<div class="qr-image">
<?php
require_once("lib/lib/full/qrlib.php");

$text_err = "";

if (isset($_POST["submit"])) {

    $input_text = $_POST["qr_text"];
    if (empty($input_text)) {
      $text_err = "Please type text.";
    } else {
        $text = $input_text;

        $save_txt = "generate/qr1.png";
        $pixel_size = 30;
        $frame_size = 10;
        
        QRcode::png($text, $save_txt, $pixel_size, $frame_size);
        echo "<img src='generate/qr1.png'>";
    }
}
?>
</div>
<table class="qr-table">
    <form method="post" action="">
        <tr>
            <td colspan="2"><h3 class="ttl">Let's create QR code.</h3></td>
        </tr>
        <tr>
            <td><label class="txt" for="qr">Text: </label></td>
            <td>
                <input class="input-txt" type="text" name="qr_text">
                <p class="message"><?php echo $text_err; ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn" type="submit" name="submit">Create</button></td>
        </tr>
    </form>
</table>