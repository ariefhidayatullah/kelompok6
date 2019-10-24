<h3>Penggunaan PhpSpreadsheet </h3>
<?php 
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new spreadsheet() ;
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !!!!!');

    $writer = new Xlsx($spreadsheet);
    $writer->save('hello world cuy.xlsx'); 
    
    ?>