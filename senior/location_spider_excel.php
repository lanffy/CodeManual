<?php
/** Error reporting */
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
// date_default_timezone_set('Asia/Shanghai');
//
//if (PHP_SAPI == 'cli')
//    die('This example should only be run from a Web Browser');
//
///** Include PHPExcel */
//require_once '../PHPExcel/Classes/PHPExcel.php';
//
//// Create new PHPExcel object
//$objPHPExcel = new PHPExcel();
//
//// Set document properties
//$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
//    ->setLastModifiedBy("Maarten Balliauw")
//    ->setTitle("Office 2007 XLSX Test Document")
//    ->setSubject("Office 2007 XLSX Test Document")
//    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
//    ->setKeywords("office 2007 openxml php")
//    ->setCategory("Test result file");

$fang['beijing']['head'] = 'http://esf.fang.com/map/?mapmode=y&district=';

$fang['beijing']['body'] = '&subwayline=&subwaystation=&price=&room=&area=&towards=&floor=&hage=&equipment=&keyword=&comarea=&orderby=30&isyouhui=&x1=115.47808&y1=39.617216&x2=116.857877&y2=40.241322&newCode=&houseNum=&a=ajaxSearch&city=bj&searchtype=&zoom=12&PageNo=1';

$fang['shanghai']['head'] = 'http://esf.sh.fang.com/map/?mapmode=y&district=';

$fang['shanghai']['body'] = '&subwayline=&subwaystation=&price=&room=&area=&towards=&floor=&hage=&equipment=&keyword=&comarea=&orderby=30&isyouhui=&x1=120.570334&y1=30.900277&x2=121.950131&y2=31.59675&newCode=&houseNum=&a=ajaxSearch&city=sh&searchtype=&zoom=12&PageNo=1';

echolog('搜房网............');
get_by_city('上海', $fang['shanghai']);
echolog();
get_by_city('北京', $fang['beijing']);

function get_by_city($city_name, $city_url_slipts)
{
    $city_url = $city_url_slipts['head'] . $city_url_slipts['body'];
    $content = get_gbk_content($city_url);
    $district_ids = [];
    echolog($city_name);
    foreach ($content as $item) {
        echolog(str_pad($item->projname, 30, ' ') . str_pad($item->x, 20, ' ') . str_pad($item->y, 22, ' ') . @$item->id . '-' . @$item->newcode);
        $district_ids[$item->projname] = $item->id;
    }
    echolog();

    foreach ($district_ids as $name => $district_id) {
        $url = $city_url_slipts['head'] . $district_id . $city_url_slipts['body'];
        echolog($name);
        $district_content = get_gbk_content($url);
        foreach ($district_content as $item) {
            echolog(str_pad($item->projname, 30, ' ') . str_pad($item->x, 20, ' ') . str_pad($item->y, 22, ' ') . @$item->id . '-' . @$item->newcode);
        }
        echolog();
    }

}

function get_gbk_content($url)
{
    $content = file_get_contents($url); //获取文件内容
    $content = gzdecode($content); //解压
    $content = json_decode($content); //转义,获取loupan数据
    $content = mb_convert_encoding($content->loupan, 'utf-8', 'gbk'); //转码
    $content = json_decode($content);
    return $content->hit;
}

function echolog($log = '')
{
    echo $log . PHP_EOL;
}

