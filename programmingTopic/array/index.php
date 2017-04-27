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

$topBrokerIndex = BROKER_COUNT - (COMPANY_COUNT - 1);
array_multisort($scores, SORT_DESC, $orderedBrokerList);
unset($scores);
$topBrokers = array_slice($orderedBrokerList, 0, $topBrokerIndex);

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
    $topBrokers = array_merge($topBrokers, array_slice($orderedBrokerList, 8, 2));
} else {
    while (count($companies) < COMPANY_COUNT) {
        if ($topBrokerIndex >= 40)
            break;
        $brokerInfo = $orderedBrokerList[$topBrokerIndex++];
        if (!in_array($brokerInfo['company'], $companies)) {
            $companies[] = $brokerInfo['company'];
            $randomIndex = random_int(5, 9);
            array_insert($topBrokers, $randomIndex, [$brokerInfo]);
        }
    }
}

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
array_multisort($scores, SORT_DESC, $stars, SORT_DESC, $orderedBrokerList);

var_dump($topBrokers);

