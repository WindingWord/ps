<?php
header("Content-type: text/html; charset=utf-8");
class db{
	public $host="localhost";
	public $name="root";
	public $password="root";
	public $dbname="cake";
	public function Query($sql){
		$db=new mysqli($this->host,$this->name,$this->password,$this->dbname);
		$r=$db->query($sql);
		return $r;
		$db.close();
	}
	public function MilkUserInsert($MilkTabName){
			$sql="select*from $MilkTabName";
			$arr = $this->Query($sql);
			
//			数组，要在这里判断是否存在
		foreach($arr as $v){
			echo"
				<tr>
					<td>{$v[0]}</td><br>
					<td>{$v[1]}</td><br>
					<td>{$v[2]}</td><br>
				</tr>
				";
		}
		return $arr;
	}
	
	public function MilkDeleteMilk($MilkTabName,$UserName){
			$arr=$this->MilkUserInsert($MilkTabName);
			
			foreach($arr as $v){
				foreach($v as $arr1){
				if($arr1[0]==$UserName){
					$sql="DELETE FROM $MilkTabName WHERE cid=$UserName";
					$arr=$this->Query($sql);
				}else{
					echo "没有这个用户";
				}
			}
		}
	}
	
	public function MilkUpdateMilk($MilkTabName,$UserName,$Userpwd){
			$arr=$this->MilkUserInsert($MilkTabName);
			
			foreach($arr as $v){
				foreach($v as $arr1){
				if($arr1[0]==$UserName){
					$sql="UPDATE $MilkTabName SET cid=$Userpwd WHERE c_name=$UserName";
					$ar=$this->Query($sql);
				}else{
					echo "没有这个用户";
				}
			}
		}
	}
}
?>