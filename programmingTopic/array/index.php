<?php

require realpath(dirname(__FILE__)) . '/原始数据.php';

define('PRIORITY_RATIO', 0.6);
define('COMPANY_RATIO', 0.2);
define('POST_RATIO', 0.1);
define('CREDIT_RATIO', 0.1);

define('BROKER_COUNT', 10);
define('COMPANY_COUNT', 3);

$cellBrokersWithId = [];
foreach ($cellBrokers as $value) {
    $cellBrokersWithId[$value['brokerid']] = $value;
}

// 算出得分
$scores = [];
$orderedBrokerList = [];
array_walk(
    $brokerLists,
    function ($brokerInfo) use ($cellBrokersWithId, $companyWeight, $brokerMaxCount, &$scores, &$orderedBrokerList) {
        $score = round(
                1 / $cellBrokersWithId[$brokerInfo['brokerid']]['level'] * PRIORITY_RATIO
                + $companyWeight[$brokerInfo['company']] * COMPANY_RATIO
                + $brokerInfo['posts'] / $brokerMaxCount['posts'] * POST_RATIO
                + $brokerInfo['credit'] / $brokerMaxCount['credit'] * CREDIT_RATIO
                , 4) * 10000;
        $scores[] = $score;
        $orderedBrokerList[] = [
            'userid' => $brokerInfo['brokerid'],
            'realname' => $brokerInfo['realname'],
            'company' => $brokerInfo['company'],
            'score' => $score
        ];
    }
);

$topBrokerIndex = BROKER_COUNT - (COMPANY_COUNT - 1);  //这里先取8个,避免不满3家经纪公司时array_pop
array_multisort($scores, SORT_DESC, $orderedBrokerList); // 按照得分降序排序
unset($scores);
$topBrokers = array_slice($orderedBrokerList, 0, $topBrokerIndex);

// 统计出现的经纪公司
$companies = [];
array_walk($topBrokers, function ($brokerInfo) use (&$companies) {
    if (!in_array($brokerInfo['company'], $companies)) $companies[] = $brokerInfo['company'];
});

function array_insert(&$array, $position, $insert_array)
{
    $first_array = array_splice($array, 0, $position);
    $array = array_merge($first_array, $insert_array, $array);
}

if (count($companies) >= COMPANY_COUNT) {
    // 如果满足3家经纪公司,取满10个经纪人
    $topBrokers = array_merge($topBrokers, array_slice($orderedBrokerList, 8, 2));
} else {
    // 不满3家经纪公司,则取到3家为止
    while (count($companies) < COMPANY_COUNT) {
        if ($topBrokerIndex >= 40) // 只考虑前40个经纪人
            break;
        $brokerInfo = $orderedBrokerList[$topBrokerIndex++];
        if (!in_array($brokerInfo['company'], $companies)) {
            $companies[] = $brokerInfo['company'];
            // 随机混排至6-10名之间
            $randomIndex = random_int(5, 9);
            array_insert($topBrokers, $randomIndex, [$brokerInfo]);
        }
    }
}

// 计算匹配度
$stars = [];
$scores = [];
$maxScore = ceil($topBrokers[0]['score'] / 0.99);
array_walk($topBrokers, function (&$brokerInfo) use ($maxScore, &$stars, &$scores) {
    $star = round($brokerInfo['score'] / $maxScore, 4) * 100;
    if ($star < 30)
        $star = round(random_int(4000, 5000) / 100, 2);
    $brokerInfo['stars'] = $star;
    $stars[] = $star;
    $scores[] = $brokerInfo['score'];
});
// 前面进行了随机混排,可能乱序了,同时随机的匹配度可能不是顺排的,这里按照得分和匹配度降序排列
array_multisort($scores, SORT_DESC, $stars, SORT_DESC, $orderedBrokerList);

var_dump($topBrokers);

