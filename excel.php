<?php  session_start();
$date_mounth = date("y.m.d"); //присвоено 03.12.01
$mounth[1] = date("d.m.y"); //присвоит 1 элементу массива 17:16:17
header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Отчет о проделанной работе за $mounth[1].xls"); 
include('query/query.php');
$doljnoct = $_SESSION['title'];

if(isset($_POST['exports'])) {
include('classes/PHPExcel.php');
include('classes/PHPExcel/Writer/Excel5.php'); 

// Создаем объект класса PHPExcel
$xls = new PHPExcel();
$xls->getProperties()->setCreator("Отчет о проделанной работе");
// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Ориентация страницы и  размер листа
$sheet->getPageSetup()
->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$sheet->getPageSetup()
->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setFitToPage(true);
$sheet->getPageSetup()->setFitToWidth(1);
$sheet->getPageSetup()->setFitToHeight(0);
// Подписываем лист
$sheet->setTitle("Отчет о проделанной работе");
//повтор заголовка таблицы на всех страницах листа
$sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(12,13);
// Настройки шрифта
$xls->getDefaultStyle()->getFont()->setName('TimesNewRoman');
$xls->getDefaultStyle()->getFont()->setSize(12);

//Ширина столбцов
$sheet->getColumnDimension('A')->setWidth(4);
$sheet->getColumnDimension('B')->setWidth(7);
$sheet->getColumnDimension('C')->setWidth(28);
$sheet->getColumnDimension('D')->setWidth(30);
$sheet->getColumnDimension('E')->setWidth(25);
$sheet->getColumnDimension('F')->setWidth(8);
$sheet->getColumnDimension('G')->setWidth(8);
$sheet->getColumnDimension('H')->setWidth(8);
$sheet->getColumnDimension('I')->setWidth(8);
$sheet->getColumnDimension('J')->setWidth(8);
$sheet->getColumnDimension('K')->setWidth(16);
$sheet->getColumnDimension('L')->setWidth(16);



// Шапка
$sheet->mergeCells("A1:G1");
$sheet->setCellValue("A1", "Отчет о проделанной работе $mounth[1]");
$sheet->getStyle("A1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


// Заголовок
$sheet->setCellValue("A2", 'Фамилия И.О. исполнителя');
$sheet->setCellValue("B2", 'Должность');
$sheet->setCellValue("C2", "$mounth[1]");
$sheet->setCellValue("C3", 'Наименование исполняемой задачи');
$sheet->setCellValue("D3", 'Наименование исполняемой операции');
$sheet->setCellValue("E3", 'Время затраченное на выполнение операции, мин.');
$sheet->setCellValue("F3", 'Достигнутый результат');

$sheet->setCellValue("A10", 'Исполнитель');
$sheet->setCellValue("E10", "$users_fios");
$sheet->setCellValue("A9", 'Итого');
$sheet->setCellValue("A4", "$users_fios");

$sheet->mergeCells("B4:B8");
$sheet->setCellValue("B4", "$doljnoct");
$s=3;
$query_ruc = "SELECT * FROM target";
$result_ruc = mysqli_query($connection, $query_ruc);
while ($row_ruc = mysqli_fetch_array($result_ruc)) { 
	 /*Добавление данных в переменные*/
	 $s++;
  $sheet->setCellValueByColumnAndRow("2",($s+0), $row_ruc['target']);

  $sheet++;
// $sheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $row_ruc['target']);
// $col=0; $row++;
}



// Объединяем ячейки
$sheet->mergeCells('A2:A3');
$sheet->mergeCells('A4:A8');
$sheet->mergeCells('B2:B3');

$sheet->mergeCells("C2:F2");

$sheet->mergeCells("A9:B9");

//Стили


$border = array(
'borders'=>array(
'outline' => array(
'style' => PHPExcel_Style_Border::BORDER_THIN,
'color' => array('rgb' => '000000')
),
)
);

$sheet->getStyle("A2:F9")->applyFromArray($border);

//стиль шапочки утверждаю
$style_top = array(
//Шрифт
'font'=>array(
'name' => 'Times New Roman',
'size' => 18
),
//рамки
'borders' => array(
'left' => array(
'style'=>PHPExcel_Style_Border::BORDER_NONE
)

),


);

$border = array(
	'borders'=>array(
		'inside' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => '000000')
		),
	)
);
 
$sheet->getStyle("A2:F9")->applyFromArray($border);


$sheet->getStyle('A2:F9')->applyFromArray($style_top);
// $sheet->getStyle('F5')->applyFromArray($style_top);

//стиль заголовка наряда
$style_middle = array(
//Шрифт
'font'=>array(
'name' => 'Times New Roman',
'size' => 10
),
//Выравнивание
'alignment' => array(
'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
),
//рамки
'borders' => array(
'left' => array(
'style'=>PHPExcel_Style_Border::BORDER_NONE
)

),
);
$sheet->getStyle('A9:B9')->applyFromArray($style_middle);
$sheet->getStyle('A4:A8')->applyFromArray($style_middle);
$sheet->getStyle('B4:B8')->applyFromArray($style_middle);
//Жирные заголовки
$sheet->getStyle('A2:F3')->applyFromArray($style_middle);
$sheet->getStyle("A2")->getFont()->setBold(true);
$sheet->getStyle("B2")->getFont()->setBold(true);
$sheet->getStyle("C2")->getFont()->setBold(true);
$sheet->getStyle("C3")->getFont()->setBold(true);
$sheet->getStyle("D3")->getFont()->setBold(true);
$sheet->getStyle("E3")->getFont()->setBold(true);
$sheet->getStyle("F3")->getFont()->setBold(true);


//Ширина ячеек
$sheet->getColumnDimension('A')->setWidth(30);
$sheet->getColumnDimension('B')->setWidth(30);
$sheet->getColumnDimension('C')->setWidth(30);
$sheet->getColumnDimension('D')->setWidth(30);
$sheet->getColumnDimension('E')->setWidth(60);
$sheet->getColumnDimension('F')->setWidth(30);
$sheet->getColumnDimension('G')->setWidth(8);
$sheet->getColumnDimension('H')->setWidth(8);
$sheet->getColumnDimension('I')->setWidth(8);
$sheet->getColumnDimension('J')->setWidth(8);
$sheet->getColumnDimension('K')->setWidth(16);
$sheet->getColumnDimension('L')->setWidth(16);


//стиль заголовков таблицы
$style_th = array(
//Шрифт
'font'=>array(
'name' => 'Times New Roman',
'size' => 10
),
//Выравнивание
'alignment' => array(
'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
),
//рамки
'borders' => array(
'allborders' => array(
'style' => PHPExcel_Style_Border::BORDER_THIN
)
),


);


//стиль табличной части
$style_table = array(
//Шрифт
'font'=>array(
'name' => 'Times New Roman',
'size' => 14
),
//Выравнивание
'alignment' => array(
'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_TOP,
'setWrapText' => 'true',
),
//рамки
'borders' => array(
'allborders' => array(
'style' => PHPExcel_Style_Border::BORDER_THIN
)
),


);

//нижнее подчеркивание
$style_underline = array(

//рамки
'borders' => array(
'bottom' => array(
'style' => PHPExcel_Style_Border::BORDER_THIN
)
),


);

//все границы

$border = array(
'borders'=>array(
'inside' => array(
'style' => PHPExcel_Style_Border::BORDER_THIN,
'color' => array('rgb' => '000000')
),
)
);
//фокус на первую страницу
$xls->setActiveSheetIndex(0);
$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
}
?>
