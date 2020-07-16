;(function(){
	alert(1);
	var LightBox=function(){
		alert(2);
		var self=this;
		this.popupMask=$('<div id="">');
		this.popupWin=$('<div id="">');
		this.bodyNode=$(document.body);
//		this.renderDOM();
		this.groupName=null;
		this.bodyNode.delegate('.js-lightbox,*[data-role]=lightbox','click',function(e){
			e.stopPropagation();
			var currentGroupName=$(this).attr('data-group');
			if(currentGroupName!=self.groupName){
				self.getGroup();
			}
		})
	};
	
	LightBox.prototype={
		getGroup:function(){
			var self=this;
			
		}
		var strDom='';
		this.popupWin.html(strDom);
		this.bodyNode.append(this.popupMask,this.popupWin);
	};
	window['LightBox']=LightBox;
})(jQuery);
