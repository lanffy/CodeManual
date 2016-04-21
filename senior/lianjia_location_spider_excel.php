<?php
/**
 * <pre>
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/4/13
 * Time: 下午1:27
 * Email: liangrao@anjuke.com
 * Desc: 爬取链家,北京的区域板块坐标: http://bj.lianjia.com/ditu/
 * </pre>
 */

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Shanghai');

//if (PHP_SAPI == 'cli')
//    die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../PHPExcel/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()
    ->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");


$base_district_url = 'http://ajax.lianjia.com/ajax/mapsearch/area/district?city_id=';

$base_block_url = 'http://ajax.lianjia.com/ajax/mapsearch/area/bizcircle?city_id=';

$urls = array(
    '北京' => '110000',
    '深圳' => '440300',
    '成都' => '510100',
    '重庆' => '500000',
    '武汉' => '420100',
    '天津' => '120000',
    '南京' => '320100',
    '杭州' => '330100',
    '厦门' => '350200',
    '长沙' => '430100',
    '青岛' => '370200',
    '大连' => '210200',
    '济南' => '370101',
);

$only_district_citys = [
    '上海' => 'http://sh.fang.lianjia.com/xinfang/mapsearchdistrict?&&position_border=1',
    '西安' => 'http://xa.fang.lianjia.com/xinfang/mapsearchdistrict?&&position_border=1',
    '石家庄' => 'http://sjz.fang.lianjia.com/xinfang/mapsearchdistrict?&&position_border=1',
];

$lianjia_all_locations = [];

generateFile();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

function generateFile()
{
    global $base_district_url, $base_block_url, $urls, $lianjia_all_locations, $objPHPExcel, $only_district_citys;
    $sheet_count = 0;
    foreach ($urls as $name => $city_id) {
        $lianjia_all_locations = [];
        $objPHPExcel->createSheet($sheet_count);
        $objPHPExcel->setActiveSheetIndex($sheet_count);
        $objPHPExcel->getActiveSheet()->setTitle($name);
        echolog(['链家', '经度', '纬度', '对方ID']);
        echolog('区域');
        $district_url = $base_district_url . $city_id;
        $districts = getContent($district_url);
        foreach ($districts as $district) {
            echolog($district);
        }

        echolog();
        echolog('板块');
        $block_url = $base_block_url . $city_id;
        $blocks = getContent($block_url);
        foreach ($blocks as $block) {
            echolog($block);
        }
        echo 'parser done->' . $name . PHP_EOL;
        $objPHPExcel->getActiveSheet()->fromArray($lianjia_all_locations);
        $sheet_count++;
    }

    foreach ($only_district_citys as $name => $url) {
        $lianjia_all_locations = [];
        $objPHPExcel->createSheet($sheet_count);
        $objPHPExcel->setActiveSheetIndex($sheet_count);
        $objPHPExcel->getActiveSheet()->setTitle($name);
        echolog(['链家', '经度', '纬度', '对方ID']);
        echolog('区域');

        $districts = getContent($url);
        foreach ($districts as $district) {
            echolog($district);
        }
        echo 'parser done->' . $name . PHP_EOL;
        $objPHPExcel->getActiveSheet()->fromArray($lianjia_all_locations);
        $sheet_count++;
    }
}

function getContent($url)
{
    $content = file_get_contents($url); //获取文件内容
    $content = json_decode($content);
    return $content->data;
}

function echolog($item = '')
{
    global $lianjia_all_locations;
    if (empty($item)) {
        $lianjia_all_locations[] = [];
        return;
    }
    if (is_string($item)) {
        $lianjia_all_locations[] = [$item];
        return;
    }
    if (is_array($item)) {
        $lianjia_all_locations[] = $item;
        return;
    }
    $item_array[] = !empty($item->name) ? $item->name : @$item->district_name;
    $item_array[] = $item->longitude;
    $item_array[] = $item->latitude;
    $item_array[] = !empty($item->id) ? @$item->id : @$item->district_id;
    $lianjia_all_locations[] = $item_array;
    unset($item_array);
}



