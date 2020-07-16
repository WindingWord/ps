var request=new XMLHttpRequest();
request.open("POST","create.php",true);
request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
request.send("name=小明&sex=男");
request.onreadystatechange=function(){
	if(request.readyState===4&&request.status===200){
		request.responseText;
	}
}
