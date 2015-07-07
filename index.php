<!DOCTYPE html>
<?php
//启动会话
session_start();
$_SESSION["session"] = 1;
setcookie("cookies", "this is a cookie name of cookies", time() + 60);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="clienthint.js"></script>
        <title>HAPPY LEARNING PHP</title>
    </head>
    <body>
        <?php echo "<p>Hello World</P>" . "\n";?>
        <hr/>
        <?php echo "中文测试...如果有乱码，则添加meta标签即可解决...<br>"; ?>
        <?php echo("在PHP中，变量都以$开始...");?>
        <hr/>
        call php function:<br>
        get browser message: <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
        <br>
        judgement browser type: 
        <?php
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == true) {
                echo("正在使用Chrome浏览器...<br/>");
            }else {
                echo("识别浏览器错误...<br/>");
            }
                
        ?>
        <hr>
        php变量:<br>
        <?php 
            $x=1;
            $yy=2;
            $z=$x+$yy;
            echo $z . "<br/>";
        ?>
        php有三种不同的变量：<br>
        <ul>
            <li>local(局部):函数内部声明的变量，只能在函数内部访问</li>
            <li>static(静态):通常，当函数完成/执行后，会删除所有变量。不过，有时我需要不删除某个局部变量。实现这一点需要更进一步的工作。要完成这一点，请在您首次声明变量时使用 static 关键词</li>
            <li>global(全局):在函数外部声明的变量，只能在函数外部访问</li>
        </ul>
        <?php
            $xx=10;
            $x=5;//全局变量
            function call_parameter() {
               $y=2;//局部变量
               echo "函数内部访问全局变量x $x" . "<br/>";
               echo "函数内部访问局部变量y $y" . "<br/>";
            };
            call_parameter();
            echo "函数外部访问全局变量x $x" . "<br/>";
            echo "函数外部访问局部变量y $y" . "<br/>";
            echo "php中的global关键字:" . "<br/>";
            function globalparameter() {
                global $x,$xx;
                $xx = $x + $xx;
            }
            globalparameter();
            echo "global使用结果： $xx" . "<br/>";
            
            echo "static 关键字修饰变量：" . "<br/>";
            function static_parameter() {
                static $z=0;
                echo "static 使用结果: $z" . "<br/>";
                $z++;
            }
        
            static_parameter();
            static_parameter();
            static_parameter();
            echo "echo输出数组元素方法：" . "<br/>";
            $animals=array("dog", "cat", "pig", "fox");
            echo "get element from array: $animals[2] <br/>";
            
            echo "php中的数据类型 <br/>";
            $a=1;
            echo var_dump($a) . "<br/>";
            $a=-1;
            echo var_dump($a) . "<br/>";
            $a=0x8C;
            echo var_dump($a) . "<br/>";
            $a=047;
            echo var_dump($a) . "<br/>";
            $a="string";
            echo var_dump($a) . "<br/>";
            $a=false;
            echo var_dump($a) . "<br/>";
            $a=1.234;
            echo var_dump($a) . "<br/>";
            $a=2.2e4;
            echo var_dump($a) . "<br/>";
            $a=array("a", 1, true, 1.234);
            echo var_dump($a) . "<br/>";
            $a=null;
            echo var_dump($a) . "<br/>";
            $a=NULL;
            echo var_dump($a) . "<br/>";
            
            echo "<hr/>php中的字符串函数 <br/>";
            echo "strlen()返回字符串的长度. ", strlen("adfafsdfads") . "<br>";
            echo "strpos() 函数用于检索字符串内指定的字符或文本。如果找到匹配，
                  则会返回首个匹配的字符位置。如果未找到匹配，则将返回 FALSE。<br/>";
            echo strpos("Hello World","World") . "<br/>";
            echo strpos("Hello World","world") . "...<br/>";
            
            echo "<hr/>php中的常量：<br/>";
            define("name", "parameter value.对大小写敏感的常量。。。");
            define("NAME_name", "NAME_ parameter value.对大小写不敏感的常量。。。", true);
            echo name . "<br>";
            echo NAME_name . "<br>";
            
            $now = time();
            $oneMonthAgo = $now - 30*24*60*60;
            echo "<h1>php时间</h1>" ."<br/>";
            echo("now:" . date("Y-m-d h:i:s") . "<br>");
            echo(date("Y-m-d h:i:s", $now) . "<br>");
            echo("onemonthago:" . date("Y-m-d h:i:s", $oneMonthAgo) . "<br>");
            // echo(getdate("y-m-d"));
            echo "<hr />";
            echo "php中定义的变量对大小写敏感，定义的其他内容对大小写不敏感，如方法，类等";
            
            echo "<hr />";
             require_once 'Car.php';
             function print_vars($obj) {
                 foreach(get_object_vars($obj) as $para => $value) {
                     echo "\t$para=$value\n";
                 }
             }
             $car = new Car("red");
             print_vars($car);
             echo '<hr />';
             $file = fopen('README.md', 'a+');
             $content = fread($file, filesize('README.md'));
             echo '<pre>' . $content . '</pre>' . '<hr />';
             
             $file = fopen('README.md', 'r');
            // while(!feof($file)) {
            //     echo '<pre>' . fgets($file) . '</pre>';
            // } 
            // echo '<hr />';
            $file = fopen('file.txt', 'w') or die('unbale to open file file.txt');
            fwrite($file, 'this is writed content.' . "\n");
            fwrite($file, 'this is writed content.' . "\n");
            fwrite($file, 'this is writed content.' . "\n");
            fwrite($file, 'this is writed content.' . "\n");
            fclose($file);
            
            
             $file = fopen('file.txt', 'a+');
             $content = fread($file, filesize('file.txt'));
             echo '<pre>' . $content . '</pre>' . '<hr />';
            echo "----------文件传输--------------";
        ?>
        
        <form action="upload_file.php", method="post" enctype="multipart/form-data">
            <label for="file">FileName:</label>
            <input type="file" name="upfile" />
            <input type="submit" value="Submit" name="submit" />
        </form>
        <?php 
            echo "-------cookie---------<br />";
            echo $_COOKIE["cookies"] . "<br />";
            echo "print all cookies:" . "<br />";
            print_r($_COOKIE);
            //数据库hostname：lanffy-phpmanual-1334103
            //user name : lanffy
            
        ?>
        <?php 
            echo "<br />------------PHP 数据库--------------<br />";
            $host = "lanffy-phpmanual-1334103";
            $username = "lanffy";
            $password = "";
            $db = "lanffy";
            $port = 3306;
            $connection = mysqli_connect($host, $username, $password, $db, $port) or die(mysql_error());
            $sql = "select * from lanffy";
            if($connection) {
                $result = mysqli_query($connection, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "the id is :" . $row["id"] . " the name is :" . $row["name"] . "<br />";
                }
            }else {
                echo mysql_error() . "<br />";
            }
        ?>
        
        <?php 
            echo "<br />------------PHP AJAX--------------<br />";
        ?>
        
        <form>
            First Name:<input type="text" id="txt1" name="txt1" onkeyup="showHint(this.value)" />
        </form>
        <p>Suggestions:<span id="txtHint"></span></p>
        <code><?php //phpinfo();?></code>
    </body>
</html>