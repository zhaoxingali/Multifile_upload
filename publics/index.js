window.onload = function(){
	var orderul = document.getElementById('showUl');
	var orderli = orderul.getElementsByTagName('li');
	if (orderli.length!=null) {
		for (var i =0;i<= orderli.length - 1; i++) {
			if (orderli[i].addEventListener) {
				orderli[i].addEventListener('click',function(e){
					fileload('../controls/download.php',e.target);
				},false);
			}else if(orderli[i].attachEvent){
				orderli[i].attachEvent('onclick',function(event){
					fileload('../controls/download.php',e.target);
				},false);
			}else{
				alert('帅锅,美女,换个浏览器试试');
			}
		};
	}
	function fileload(url1,targetnode){
		var filename = targetnode.innerHTML;
		var loadfile ={
			filename:filename
		};
		$.ajax({
			url:url1,
			type:'POST',
			cache:false,
        	timeout:5000,
        	dataType:"json",
        	data:loadfile,
        	success:function(data){
        		console.log(data);
        	},
        	error:function(){
        		console.log(false);
        	}
		})

	}
};