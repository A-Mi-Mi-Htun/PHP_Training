<?php 
/**
 *Read and display txt fie 
 */
echo "<h4>Text File</h4>";
$txtFile = file_get_contents("file/sample.txt");
echo "<pre>$txtFile</pre>";
?>

<!DOCTYPE html>
<html lang="en">
    
<body>
    <?php
    /**
     *Read and display csv file 
     */
    echo "<table>";
    echo "<h4>CSV File</h4>";
    $csvFile = fopen("file/sample.csv", "r");
    while(($data = fgetcsv($csvFile)) !== false) {
        echo "<tr>";
        foreach ($data as $i) {
            echo "<td>" . htmlspecialchars($i) . "</td>";
        }
        echo "</tr><br>";
    }
    fclose($csvFile);
    echo "</table>";
    ?>
</body>
</html>

<?php
/**
 * 
 * Read and display docx file 
 */
echo "<h4>Document File</h4>";
include("lib/doc2txt.class.php");
$docObj = new Doc2Txt("file/sample.docx");
$documentFile = $docObj->convertToText();
echo "<pre>$documentFile</pre";
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <table>
        <?php
        /**
         * Read and display excel file
         */
        echo "<h4>Excel File</h4>";
        require("lib/vendor/autoload.php");
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("file/sample.xlsx");
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            echo "<tr>";
            foreach ($cellIterator as $cell) {
                echo "<td>" . $cell->getValue() . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>