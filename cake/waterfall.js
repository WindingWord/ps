window.onload=function(){
	waterfall('main','box');
	var dataInt={"data":[]}
}

function waterfall(parent,box){
	//将mian下的所有的class为box的元素取出
	var oparent=document.getElementById(parent);
	var oBoxs=getByClass(oparent,box);
	var oBoxW=oBoxs[0].offsetWidth;
	var cols=Math.floor(document.documentElement.clientWidth/oBoxW);
	oparent.style.cssText='width:'+oBoxW*cols+'px;margin: 0 auto';
	
	var hArr=[]; 
	for(var i=0;i<oBoxs[i].length;i++){
		if(i<cols){
			hArr.push(oBoxs[i].offsetHeight);
		}else{
			var minH=Math.min.apply(null,hArr);
			var index=getMinhIndex(hArr,minH);
			oBoxs[i].style.position=minH+'px';
//			oBoxs[i].style.left=oBoxW*index+'px';
			oBoxs[i].style.left=oBoxs[index].offsetLeft+'px';
			hArr[index]+=oBoxs[i].offsetHeight;
		}
	}
}

//根据class获取元素
function getByClass(parent,clsName){
	var boxArr=new Array(), //用来存储获取到的所有class为box的元素
		oElements=parent.getElementsByTagName("*");
	for(var i=0;i<oElements.length;i++){
		if(oElements[i].className==clsName){
			boxArr.push(oElements[i]);	
		}
	}
	return boxArr;
}

function getMinhIndex(arr,val){
	for(var i in arr){
		if(arr[i]==val){
			return i;
		}
	}
}
