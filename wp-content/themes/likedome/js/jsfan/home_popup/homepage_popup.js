<!--   
//set cookie
function setCookie(name,value)  
{  
	var then = new Date();    
	then.setTime(then.getTime() + 24*60*60*1000);  
	document.cookie = name + "="+ escape (value) + ";expires=" + then.toGMTString();  
}
//��ȡcookies  
function getCookie(name)  
{  
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");  
	if(arr=document.cookie.match(reg)) return unescape(arr[2]);  
	else return null;  
}   

function ext()//�ر���ҳʱ����   
{   
	//if(window.event.clientY<132 || altKey) iie.launchURL(popURL);
	iie.launchURL(popURL);
}   
function brs()//����object   
{   
	document.body.innerHTML+="<object id='iie' width='0' height='0' classid='CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6'></object>"; 
}
var ispop = getCookie("homepopupper30min");
var popURL='http://www.766.com';//��������ַ
if(ispop == null && window.attachEvent){
	eval("window.attachEvent('onunload',ext);");
	eval("window.attachEvent('onload',brs);");   
	setCookie("homepopupper30min","yes");
}
//-->   
