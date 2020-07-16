<meta charset="utf-8">
<?php 
//直接将代码放到php文件里
$con = mysqli_connect("localhost", "root", "root", "db_shop");//连接数据库
        $sql = "SELECT * FROM tb_img";//读取表
        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $path=$row['name'];//将获取到的路径放入变量中
            echo $path;
            echo "<img src=$path>";//直接实用$path变量输出
        }
?>