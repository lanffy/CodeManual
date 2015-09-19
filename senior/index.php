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
            echo $email1 . 'email1是正确格式的邮箱地址<br />';
        }else {
            echo $email1 . 'email1不是正确格式的邮箱地址<br />';
        }
        if(filter_var($email2, FILTER_VALIDATE_EMAIL)){
            echo $email2 . 'email2是正确格式的邮箱地址<br />';
        }else {
            echo $email2 . 'email2不是正确格式的邮箱地址<br />';
        }
        $email22 = filter_var($email2, FILTER_SANITIZE_EMAIL);
        echo $email22;
        if(filter_var($email2, FILTER_VALIDATE_EMAIL)){
            echo $email2 . 'email2是正确格式的邮箱地址<br />';
        }else {
            echo $email2 . 'email2不是正确格式的邮箱地址<br />';
        }
        ?>
        <h1>XML解析</h1>
        <?php
        $parser = xml_parser_create();
        function start($parser, $element_name, $element_attrs) {
            switch($element_name) {
                case "NOTE" :
                    echo "-- NOTE --<br />";
                break;
                case "TO":
                echo "To: ";
                break; 
                case "FROM":
                echo "From: ";
                break; 
                case "HEADING":
                echo "Heading: ";
                break; 
                case "BODY":
                echo "Message: ";
            }
        }
        function stop($parser, $element_name) {
            echo "<br />";
        }
        function char($parser, $data) {
            echo $data;
        }
        xml_set_element_handler($parser, "start", "stop");
        xml_set_character_data_handler($parser, "char");
        $fp = fopen("xml_file.xml", "r");
        while($data = fread($fp, 4096)) {
            xml_parse($parser, $data, feof($fp)) or die(sprintf("XML Error: %s at line %d", 
                    xml_error_string(xml_get_error_code($parser)),
                    xml_get_current_line_number($parser)
                ));
        }
        xml_parser_free($parser);
        ?>
        <h1>页面跳转</h1>
        <a href="a.html">a.html</a>
        <h1>文件夹便遍历</h1>
        <?php 
            function my_scandir($dir){
                $files=array();
                if(is_dir($dir)){
                    if($handle=opendir($dir)){
                        while(($file=readdir($handle))!==false){
                            // if($file!="." && $file!=".."){
                            if(strpos($file, ".") !== 0){
                                if(is_dir($dir . "/" . $file)){
                                    $files[]=my_scandir($dir."/".$file);
                                }else{
                                    $files[]=$dir."/".$file;
                                }
                            }
                        }
                        closedir($handle);
                        return $files;
                    }
                }else {
                    $files[] = $dir;
                    return $files;
                }
            }
            
            $files = my_scandir("/home/ubuntu/workspace/phpmanual/");
            var_dump($files);
        ?>
        <?php 
            echo "<br />同一个html文件内调用php方法：<br />";
            var_dump(my_scandir("/home/ubuntu/workspace/phpmanual/"));
            echo "<br />获取url中文件的后缀名称：<br />";
            $url = "http://www.sina.com.cn/abc/de/fg.php?id=1";
            $baseName = basename($url);
            echo $baseName . "<br />";
            var_dump(parse_url($url));
            $nodePos = strpos($baseName, ".");
            $questPos = strpos($baseName, "?");
            if(strstr($baseName, "?")) {
                echo "<br /> " . $nodePos . " " . $questPos . " " . substr($baseName, $nodePos + 1, $questPos - $nodePos - 1) . "<br />";
            }else {
                echo "<br /> " . $nodePos . " " . $questPos . " " .substr($baseName, $nodePos + 1) . "<br />";
            }
        ?>
        <h1>获取路径后缀的方法</h1>
        <?php 
            $path = "dir/upload.image.jpg";
            echo "<br />方法1：strrchr() :" . strrchr($path, ".") . "<br />";
            echo "<br />方法2：substr() :" . substr($path, strrpos($path, ".")) . "<br />";
            echo "<br />方法3：array_pop() :" . array_pop(explode(".", $path)) . "<br />";
            echo "<br />方法4：pathinfo() :" . pathinfo($path, PATHINFO_EXTENSION) . "<br />";
        
        ?>
        <h1>页脚引用</h1>
        <?php include 'include_footer.php'; ?>
    </body>
</html>