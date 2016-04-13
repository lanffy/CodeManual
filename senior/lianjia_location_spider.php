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
var_dump($all_locations);

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


