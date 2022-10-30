<?php
require '..\vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\SpreadSheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new SpreadSheet();

$spreadsheet->getProperties()->setCreator("Marko Robles")->setTitle("Inventario");
$spreadsheet->setActiveSheetIndex(0);
$hojaactiva=$spreadsheet->getActiveSheet();

$hojaactiva->setCellValue('A1',"Hola");

$hojaactiva->setCellValue('A2',123);

$hojaactiva->setCellValue('c1',"Holasaa")->setCellValue('D1','adios');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Inventario.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

?>