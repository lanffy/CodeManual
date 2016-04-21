<?php
/**
 * <pre>
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/4/13
 * Time: 下午1:27
 * Email: liangrao@anjuke.com
 * Desc: 爬取搜房网的区域板块坐标,爬取网址:http://esf.fang.com/map/  http://esf.sh.fang.com/map/
 * </pre>
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Shanghai');

//if (PHP_SAPI == 'cli')
//    die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../PHPExcel/Classes/PHPExcel.php';

// Create new PHPExcel object
$fang_objPHPExcel = new PHPExcel();

// Set document properties
$fang_objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

/********import PHPExcel end*************/

$all_citys = [
    'bj' => '北京',
    'sh' => '上海',
    'sz' => '深圳',
    'cd' => '成都',
    'gz' => '广州',
    'suzhou' => '苏州',
    'cq' => '重庆',
    'wuhan' => '武汉',
    'tj' => '天津',
    'nanjing' => '南京',
    'hf' => '合肥',
    'hz' => '杭州',
    'zz' => '郑州',
    'sjz' => '石家庄',
    'xm' => '厦门',
    'cs' => '长沙',
    'xian' => '西安',
    'qd' => '青岛',
    'dl' => '大连',
    'fz' => '福州',
    'fs' => '佛山',
    'wuxi' => '无锡',
    'hrb' => '哈尔滨',
    'jn' => '济南',
    'ks' => '昆山',
    'dg' => '东莞',
    'km' => '昆明',
    'sy' => '沈阳',
    'zh' => '珠海',
    'nc' => '南昌',
    'changchun' => '长春',
    'huizhou' => '惠州',
    'nn' => '南宁',
    'taiyuan' => '太原',
];

$url_head = 'http://esf.fang.com/map/?a=getDistArea&city=';

$fang_all_locations = [];
$file_name = "fang_location.xlsx";

generateFile();

$objWriter = PHPExcel_IOFactory::createWriter($fang_objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

function generateFile()
{
    global $fang_all_locations, $all_citys, $fang_objPHPExcel, $url_head;
    $sheet_count = 0;
    foreach ($all_citys as $city_pinyin => $name) {
        $fang_all_locations = [];
        $fang_objPHPExcel->createSheet($sheet_count);
        $fang_objPHPExcel->setActiveSheetIndex($sheet_count);
        $fang_objPHPExcel->getActiveSheet()->setTitle($name);
        $url = $url_head . $city_pinyin;
        echolog(['搜房网', '经度', '纬度', '对方ID']);
        get_by_city($name, $url);
        echo 'parser done' . $name . PHP_EOL;
        //填充表格信息
        $fang_objPHPExcel->getActiveSheet()->fromArray($fang_all_locations);
        $sheet_count++;
    }

}

function get_by_city($city_name, $url)
{
    $districts = get_gbk_content($url);
    echolog($city_name);
    foreach ($districts as $district) {
        $blocks = $district->area;
        unset($district->area);
        echolog($district->name);
        echolog($district);
        echolog();

        foreach ($blocks as $block) {
            echolog($block);
        }
        echolog();
    }
}

function get_gbk_content($url)
{
    $content = file_get_contents($url); //获取文件内容
    $content = gzdecode($content); //解压
    $content = json_decode($content); //转义,获取loupan数据
    return $content;
}

function echolog($item = '')
{
    global $fang_all_locations;
    if (empty($item)) {
        $fang_all_locations[] = [];
        return;
    }
    if (is_string($item)) {
        $fang_all_locations[] = [$item];
        return;
    }
    if (is_array($item)) {
        $fang_all_locations[] = $item;
        return;
    }
    $item_array[] = $item->name;
    $item_array[] = $item->x;
    $item_array[] = $item->y;
    $item_array[] = !empty($item->id) ? @$item->id : '无法获取ID';
    $fang_all_locations[] = $item_array;
}

//$letter = array('A', 'B', 'C', 'D', 'E', 'F', 'F', 'G');
//
////填充表格信息
//for ($i = 1; $i <= count($fang_all_locations); $i++) {
//    $j = 0;
//    $data = $fang_all_locations[$i - 1];
//    foreach ($data as $item) {
//        $objPHPExcel->getActiveSheet()->setCellValue("$letter[$j]$i", $item);
//        $j++;
//    }
//}


// Redirect output to a client’s web browser (Excel2007)
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Disposition: attachment;filename="' . $file_name . '"');
//header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
//header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
//header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
//header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
//header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
//header('Pragma: public'); // HTTP/1.0

//$objWriter = PHPExcel_IOFactory::createWriter($fang_objPHPExcel, 'Excel2007');
//$objWriter->save('php://output');
exit;
