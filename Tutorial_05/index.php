<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<div class="container">
    <h3 class="main-ttl">Tutorial_05</h3>
    <?php
    error_reporting(0);

    /**
     *Read and display txt fie
     */
    echo "<div class='box-one'>";
    echo "<h4 class='ttl'>Text File</h4>";
    $txtFile = file_get_contents("file/sample.txt");
    echo "<pre class='txt'>$txtFile</pre>";
    echo "</div>";
    
    /**
     *Read and display csv file
     */
    echo "<div class='box-two'>";
    echo "<table class='csv-table'>";
    echo "<h4 class='ttl'>CSV File</h4>";
    $csvFile = fopen("file/sample.csv", "r");
    while (($data = fgetcsv($csvFile)) !== false) {
        echo "<tr>";
        foreach ($data as $i) {
            echo "<td>" . htmlspecialchars($i) . "</td>";
        }
        echo "</tr>";
    }
    fclose($csvFile);
    echo "</table>";
    echo "</div>";
    
    /**
     *
     * Read and display docx file
     */
    echo "<div class='box-three'>";
    echo "<h4 class='ttl'>Document File</h4>";
    include "lib/doc2txt.class.php";
    $docObj = new Doc2Txt("file/sample.docx");
    $documentFile = $docObj->convertToText();
    echo "<pre class='txt'>$documentFile</pre>";
    echo "</div>";
    
    /**
     * Read and display excel file
     */
    echo "<div class='box-four'>";
    echo "<table class='excel-table'>";
    echo "<h4 class='ttl'>Excel File</h4>";
    require "lib/vendor/autoload.php";
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
    echo "</table>";
    echo "</div>";
    ?>
    
</div>