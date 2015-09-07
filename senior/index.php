<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['views'])) {
    $_SESSION['views'] = $_SESSION['views'] + 1;
    if($_SESSION['views'] >= 20)
        unset($_SESSION['views']);
}
else 
    $_SESSION['views'] = 1;
?>
<html>
    <body>
        <h1>多维数组</h1>
        <?php 
            $cars = array(
                array("Volvo", 22, 18),
                array("BMW", 15, 12),
                array("Saab", 5, 10),
                array("Land Rover", 2, 8)
            );
            for($i = 0; $i < count($cars); $i++)
                echo '品牌名称：' . $cars[$i][0] . '; 库存:' . $cars[$i][1] . '; 销量：' . $cars[$i][2] . '.<br />';
        ?>
        <h1>时间</h1>
        <?php
            date_default_timezone_set("Asia/Shanghai");
            echo '时区：' . date_default_timezone_get() . '<br />';
            echo '当前时间：' . date("Y-m-d H:i:s a") . '<br />';
            echo '昨天：' . date("Y-m-d H:i:s a", strtotime("-1 day")) . '<br />';
            echo '明天：' . date("Y-m-d H:i:s a", strtotime("1 day")) . '<br />';
            echo '上一周：' . date("Y-m-d H:i:s a", strtotime("-1 week")) . '<br />';
            echo "一周后:".date("Y-m-d",strtotime("+1 week")). "<br>";     
            echo "一周零两天四小时两秒后:".date("Y-m-d H:i:s",strtotime("+1 week 2 days 4 hours 2 seconds")). "<br>";     
            echo "下个星期四:".date("Y-m-d",strtotime("next Thursday")). "<br>";     
            echo "上个周一:".date("Y-m-d",strtotime("last Monday"))."<br>";     
            echo "一个月前:".date("Y-m-d",strtotime("last month"))."<br>";     
            echo "一个月后:".date("Y-m-d",strtotime("+1 month"))."<br>";     
            echo "十年后:".date("Y-m-d",strtotime("+10 year"))."<br>";    
        ?>
        <h1>文件</h1>
        <?php 
            echo readfile('file.txt');
        ?>
        <h1>SESSION</h1>
        <?php 
        echo '读取SESSSION:' . $_SESSION['views'];
        ?>
        <h1>过滤器</h1>
        <?php
        $int = 123;
        $int_option = array(
                "options" => array(
                        "min_range" => 0,
                        "max_range" => 256
                    )
            );
        if(filter_var($int, FILTER_VALIDATE_INT)){
            echo '参数int是整型类型<br />';
            if(!filter_var($int, FILTER_VALIDATE_INT, $int_option)) {
                echo '参数int在给定范围内<br />';
            }else {
                echo '参数int不在给定范围内<br />';
            }
        }else {
            echo '参数int不是整型类型<br />';
        }
        
        $email1 = "1231232@qq.com";
        $email2 = "@0A:1231232@qq.com";
        if(filter_var($email1, FILTER_VALIDATE_EMAIL)){
            echo 'email1是正确格式的邮箱地址<br />';
        }else {
            echo 'email1不是正确格式的邮箱地址<br />';
        }
        if(filter_var($email2, FILTER_VALIDATE_EMAIL)){
            echo 'email2是正确格式的邮箱地址<br />';
        }else {
            echo 'email2不是正确格式的邮箱地址<br />';
        }
        $email22 = filter_var($email2, FILTER_SANITIZE_EMAIL);
        echo $email22;
        if(filter_var($email2, FILTER_VALIDATE_EMAIL)){
            echo 'email2是正确格式的邮箱地址<br />';
        }else {
            echo 'email2不是正确格式的邮箱地址<br />';
        }
        ?>
        
        <h1>页脚引用</h1>
        <?php include 'include_footer.php'; ?>
    </body>
</html>