<meta charset="utf-8">
<?php 
//	更新数据,传唤字符串,i++;
	$Cname=$_POST["Cname"];
	
	$Cage=is_string($_POST["Cage"]);
	
	
	echo $Cname,$Cage;
	$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cake";
// 创建连接
	
		echo $username;
		$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功";
		$i=0;
		function Milk(){
			$sql = "INSERT INTO users (cid, c_name, c_pwd)
VALUES (i++, $Cname, $Cage)";
		if ($conn->query($sql) === TRUE) {
    		echo "新记录插入成功";
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		}
		
		$conn->close();
	
	 
	?>
	


<!--$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";
 
if ($conn->multi_query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();-->

<!--封装成一条条的数据-->
<!--$fields = array('a','b','c','d');//你的字段
foreach($fields as $val){
 if(!empty($_POST[$val])){
   $data[$val] = in($_POST[$val]);
  }
}-->

<!--$data=array();
$data['a']=in($_POST['a']);
$data['b']=in($_POST['b']);
$data['c']=in($_POST['c]);
$data['d']=in($_POST['d']);
$data['aa']=in($_POST['aa']);
$data['a1']=in($_POST['a1']);-->