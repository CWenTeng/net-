$(function () {
$(".citybox li").hover(function(){
        $(this).addClass('hover');
    }, function(){
        $(this).removeClass('hover');
    });
});
$('a').click(function(){
	//document.getElementById("chengshi").value;
	// alert();
	var chengshick=$(this).html();
	if(chengshick=="首页"||chengshick=="切换城市"||chengshick=="本站新闻"||chengshick=="分科病种"||chengshick=="健康常识"||chengshick=="医院社区"||chengshick=="加盟医院"||chengshick=="注册"||chengshick=="登陆"){
		return ;
	}else{
		setCookie('chengshick',chengshick,365);
		document.getElementById("chengshi").innerHTML=chengshick;
		window.location.href=("/advanced4/frontend/web/index.php?r=site%2Findex");
	}
	// document.getElementById("chengshi").innerHTML= $(this).html();
	
  	//$(this).html();
});


function setCookie(c_name,value,expiredays)
{
var exdate=new Date()
exdate.setDate(exdate.getDate()+expiredays)
document.cookie=c_name+ "=" +value+
((expiredays==null) ? "" : "; expires="+exdate.toGMTString())
}
