<?php
/**
 * <pre>
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/4/13
 * Time: 下午1:27
 * Email: liangrao@anjuke.com
 * Desc:
 * </pre>
 */

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Shanghai');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once '../PHPExcel/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");


$district_url = 'http://ajax.lianjia.com/ajax/mapsearch/area/district?&&city_id=110000&_=1460525163642';


$biz_circle_url = 'http://ajax.lianjia.com/ajax/mapsearch/area/bizcircle?&&city_id=110000&_=1460519625095';

$all_locations = [];

$districts = getContent($district_url);
$district_locations = handler($districts);
unset($districts);

$biz_circles = getContent($biz_circle_url);
$biz_circle_locations = handler($biz_circles);
unset($biz_circles);

$array_title = [['链家', '经度', '纬度', '对方ID'], ['北京区域']];

$all_locations = array_merge($array_title, $district_locations, [[]], [['北京商圈']], $biz_circle_locations);
unset($district_locations, $biz_circle_locations);

$letter = array('A', 'B', 'C', 'D', 'E', 'F', 'F', 'G');

//填充表格信息
for ($i = 1; $i <= count($all_locations); $i++) {
    $j = 0;
    $data = $all_locations[$i - 1];
    foreach ($data as $key => $item) {
        $objPHPExcel->getActiveSheet()->setCellValue("$letter[$j]$i", $item);
        $j++;
    }
}

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="lianjia_beijing_location.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

function getContent($url)
{
    $content = file_get_contents($url); //获取文件内容
    $content = json_decode($content);
    return $content->data;
}

function handler($content)
{
    $locations = [];
    foreach ($content as $item) {
        $item_array[] = $item->name;
        $item_array[] = $item->longitude;
        $item_array[] = $item->latitude;
        $item_array[] = !empty($item->id) ? @$item->id : 0;
        $locations[] = $item_array;
        unset($item_array);
    }
    return $locations;
}


