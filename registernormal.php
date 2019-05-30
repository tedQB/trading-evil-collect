<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title></title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://a.alipayobjects.com/arale/calendar/1.0.0/calendar.css">	
	<link charset="utf-8" rel="stylesheet" href="https://a.alipayobjects.com/arale/dialog/1.2.6/dialog.css" />	
	<script type="text/javascript" src="https://a.alipayobjects.com/seajs/seajs/2.2.0/sea.js"></script>
	<script type="text/javascript" src="https://a.alipayobjects.com/seajs/seajs-style/1.0.2/seajs-style.js"></script>
	<style type="text/css">
		.input-group{margin:5px 0;}
	</style>
</head>
	<h1>登陆戒色榜单</h1>
	<body>
		<form role="form" method="post" id="test-form">
			  <div class="input-group">
			    <label for="weixinName" class="input-group-addon">微信Id</label>
			    <input type="text" class="form-control" id="weixinName" placeholder="输入微信Id" />
			  </div>
			  <div class="input-group" class="input-group-addon">
			    <label for="name" class="input-group-addon">本人姓名</label>
			   	<input type="text" class="form-control" id="name" placeholder="本人姓名" />
			  </div>
			  <div class="input-group">
			    <label for="nickName" class="input-group-addon">戒色榜姓名</label>
			    <input type="text" class="form-control" id="nickName" placeholder="戒色榜姓名">
			  </div>
			  <div class="input-group">
			    <label for="luruTime" class="input-group-addon">录入时间</label>
			   	<input id="luruTime" type="text" placeholder="录入时间" class="form-control" placeholder="录入时间" /><br />
			  </div>
			  <div class="input-group">
			    <label for="jieseTime" class="input-group-addon">戒色时间</label>
			    <input type="text" class="form-control" id="jieseTime" placeholder="戒色时间" value="120">
			  </div>
			  <div class="input-group">
			    <label for="endTime" class="input-group-addon">戒色结束时间</label>
			    <input type="text" class="form-control" id="endTime" placeholder="戒色结束时间" value="">
			  </div>			  
			  <button type="button" class="btn btn-default" id="submitBtn" >Submit</button>
			</form>
		<script type="text/javascript">
			seajs.config({
			  alias: {
			    $: 'https://a.alipayobjects.com/jquery/jquery/1.9.1/jquery.js'
			  }
			});
			function AddDays(date,days){
				var nd = new Date(date);
				nd = nd.valueOf();
				nd = nd + days * 24 * 60 * 60 * 1000;
				nd = new Date(nd);
				//alert(nd.getFullYear() + "年" + (nd.getMonth() + 1) + "月" + nd.getDate() + "日");
				var y = nd.getFullYear();
				var m = nd.getMonth()+1;
				var d = nd.getDate();
				if(m <= 9) m = "0"+m;
				if(d <= 9) d = "0"+d; 
				var cdate = y+"-"+m+"-"+d;
				return cdate;
			};

			seajs.use(['$','https://a.alipayobjects.com/arale/calendar/1.0.0/calendar.js','https://a.alipayobjects.com/arale/dialog/1.2.6/confirmbox.js'], function($,Calendar,ConfirmBox) {
			    new Calendar({trigger: '#luruTime'});
			    //计算到期时间		    
			    $('#jieseTime').focusout(function(){
			    	var luruTime = new Date($('#luruTime').val())
			    	var jieseTime = $('#jieseTime').val();
			    	$('#endTime').val(AddDays(luruTime,jieseTime));

			    })
			    //console.log(Dialog);
				$(document).keypress(function(event){  
					if($('.arale-dialog-1_2_6').is(':visible')){	
					    var keycode = (event.keyCode ? event.keyCode : event.which);  
					    if(keycode == '13'||keycode=='32'){  
					       	$('.arale-dialog-1_2_6').remove(); 
					    }  
					}
				});  
			    $('#submitBtn').click(function(){

			    	if(confirmForm()){
				    	$.post("userUp.php",{
				    		weixinName:$('#weixinName').val(),
				    		name:$('#name').val(),
				    		nickName:$('#nickName').val(),
				    		luruTime:$('#luruTime').val(),
				    		jieseTime:$('#jieseTime').val(),
				    		endTime:$('#endTime').val()
						
				    	},function(data){
				    		console.log(data);
				    		if(data=='sucess'){ 
						    	var cb = new ConfirmBox({
							        trigger: '#dialog',
							        title: '成功提示',
							        message: "<div>添加成功</div>",
							        confirmTpl: '<button class="ui-dialog-button-orange">确定</button>',
							        cancelTpl: '<button>取消</button>',
							        onConfirm:function(){ 
							        	this.hide();
							        }

						    	}).show();
				    		}


				    	})
			    	}
			    })
				function confirmForm(){ 
					var err=[];
			    	$('.form-control').each(function(index,obj){ 
			    		if($(obj).val()==''){ 
						    err.push($(obj));
						    return false; 
			    		}
			    	})

			    	if(err.length){
				    	var cb = new ConfirmBox({
					        trigger: '#dialog',
					        title: '出错提示',
					        message: "<div>"+err[0].attr('id')+"不能为空</div>",
					        confirmTpl: '<button class="ui-dialog-button-orange">确定</button>',
					        cancelTpl: '<button>取消</button>',
					        onConfirm:function(){ 
					        	this.hide();
					        }					        
				    	}).show();
					}else{ 
						return true; 
					}
			    	
				};

			});
		</script>	
	</body>
	
</html>
