<?php
//计算出 $filePath2 相对于 $filePath1 的相对路径应该是
function getRelativePath($filePath1, $filePath2) {
    $file1_url = array(dirname($filePath1));
    $file2_url = array(dirname($filePath2));
    echo "the file1 path info is:" . "\n";
    var_dump($file1_url);
    echo "the file2 path info is:" . "\n";
    var_dump($file2_url);
    $file1_arr = explode('/', $file1_url[0]);
    $file2_arr = explode('/', $file2_url[0]);
    $path1_arr_len = count($file1_arr);
    $art1 = '';
    $art2 = '';
    for ($i = 0; $i < $path1_arr_len; $i++) {
        if($file1_arr[$i] <> $file2_arr[$i]) {
            $art1 .= '../';
            $art2 .= $file1_arr[$i] . '/';
        }
    }
    return $art1 . $art2;
}

$filePath1 = '/a/b/c/d/e.php';
$filePath2 = '/a/b/12/34/c.php';
$result = getRelativePath($filePath1, $filePath2);
echo 'filePath1 is : ' . $filePath1 . '\n';
echo 'filePath2 is : ' . $filePath2 . '\n';
echo 'filePath2 相对于 filePath2 的相对路径是：' . $result . "\n";

