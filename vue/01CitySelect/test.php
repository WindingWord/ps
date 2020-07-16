<?php
	header("content-type:text/html;charset-utf-8");

	$p=$_POST["provice"];
	switch ($p) {
		case '山西省':
			echo "太原市,大同市,晋中市,忻州市";
			break;
		case '广东省':
			echo "广州市,深圳市,中山市,珠海市,佛山市";
			break;
		case '湖南省':
			echo "长沙市,岳阳市,湘潭市,株洲市";
			break;
		case '山东省':
			echo "济南市,烟台市,青岛市,威海市";
			break;
		default:
			echo "";
			break;
	}
	$b=$_POST["city"];
	switch($b){
		case '山西省':
			echo "太原市,大同市,晋中市,忻州市";
			break;
		case '广东省':
			echo "广州市,深圳市,中山市,珠海市,佛山市";
			break;
		case '湖南省':
			echo "长沙市,岳阳市,湘潭市,株洲市";
			break;
		case '山东省':
			echo "济南市,烟台市,青岛市,威海市";
			break;
		default:
			echo "";
			break;
	}
?>