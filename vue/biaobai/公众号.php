<?php
	const app = express();
	const config={
		token:'',
		appId:'',
		appsecret:''
	}
	app.use((req,res,next)=>{
		console.log(req.query);
		const {signature,echostr,timestamp,nonce}=req.query;
		const{token}=config;
		
		const arr=[timestamp,nonce,token];
		const arrSort=arr.sort();
		console.log(arrSort);
		const sha1str=sha1(str);
		if(sha1str===signature){
			res.send(echostr);
		}else{
			res.send("error");
		}
	})
	app.listen(3000,()=>console.log("服务器重启成功了"));
?>