/* JS Document 
Version:	1.0
Date:		2010/10/16
Author:		XX
Update:
*/
(function($){
	//ͼƬ����
	$.after_img=function(obj){
		var defname="imgsrc";	  
		$(obj).each(function(i){
			if($(obj).eq(i).attr("src")=="" || $(obj).eq(i).attr("src")=="http://img.ue.766.com/common/blank.gif" )
			{
				if(!$(obj).eq(i).attr(defname))return;
				$(obj).eq(i).attr("src",$(obj).eq(i).attr(defname));	
			}
		});
	};
	$.fn.after_img=function(){
		new $.after_img($(this));
		return this;
	};
	//�л��˵�
	$.tab=function(obj1,obj2,iBeHavior,fun){
		var _timer;
		var last=0;
		obj2.find("img").each(function(i,j){
			if($(j).attr("src")=="")$(j).attr("src","http://img.ue.766.com/common/blank.gif");
		});
		obj2.eq(0).show();
		obj2.eq(0).find("img").after_img();
		obj1.each(function(i){
			showD=function(){
				obj1.attr("class"," ");
				obj1.eq(i).attr("class","select");
				obj2.hide();
				obj2.eq(i).show();
				obj2.eq(i).find("img").after_img();
				if(fun)eval("fun(obj1.eq("+i+"),obj2.eq("+i+"))");
			}
			eval("$(this)."+iBeHavior+"("+showD+")");
		});
	};
	$.fn.tab=function(iBeHavior,fun){
		var iBeHavior = iBeHavior || 'click';
		var obj1=$(this).find(".tab_menu li");
		var obj2=$(this).find(".tab_main");
		new $.tab(obj1,obj2,iBeHavior,fun);
		return this;
	};
})(jQuery);
/*
ʹ�÷�����
$("#test1").tab("click");
��#test1�����Ƕ����ID������Ĳ���Ҳ����д�����className��д����CSSһ��������.test1����
Html����Ļ����ṹʽ��
	<div id="test1">    //�����id����$("#test1").tab();�������id�����Ӧ��
		<ul class="tab_menu">  //�����class���ǹ̶���
			<li class="select">����1</li>
			<li>����2</li>
			<li>����3</li>
		</ul>
		<div class="tab_main">����1<img src="" imgsrc="ͼƬ��ַ"/></div>
		<div class="tab_main">����2</div>
		<div class="tab_main">����3</div>
	</div>
*/