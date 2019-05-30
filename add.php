<?php  
	@session_start(); 
	
	if(!isset($_SESSION['username'])){
		
		if(!isset($_COOKIE['username'])) 
		{	
			header("Location:login.html");
			exit();
		}
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title></title>
	<link rel="stylesheet" href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://a.alipayobjects.com/arale/calendar/1.0.0/calendar.css">	
	<link charset="utf-8" rel="stylesheet" href="https://a.alipayobjects.com/arale/dialog/1.2.6/dialog.css" />	
	<script type="text/javascript" src="https://a.alipayobjects.com/seajs/seajs/2.2.0/sea.js"></script>
	<script type="text/javascript" src="https://a.alipayobjects.com/seajs/seajs-style/1.0.2/seajs-style.js"></script>
	<style type="text/css">
		.input-group{margin:5px 0;}
	</style>
</head>
	<h1>快速录入 <a href="out.php">返回</a></h1>
	<body>
		<form role="form" method="post" id="test-form">
			  <div class="input-group">
			    <label for="evilCode" class="input-group-addon">上市公司代码/投资品种代码</label>
			    <input type="text" class="form-control" id="evilCode" placeholder="上市公司代码/投资品种代码" />
			  </div>
			  <div class="input-group">
			    <label for="evilName" class="input-group-addon">上市公司名称/投资品种名称</label>
			    <input type="text" class="form-control" id="evilName" placeholder="上市公司名称/投资品种名称">
			  </div>
			  <div class="input-group">
			    <label for="luruTime" class="input-group-addon">录入时间</label>
			   	<input id="luruTime" type="text" class="form-control" value="<?php echo date('Y-m-d')?>" /><br />
			  </div>
			   <div class="input-group">
			    <label for="evilType" class="input-group-addon">劣迹类型</label>
			    <div class="row">
				    <div class="col-xs-2">
						<select class="form-control" id="evilType">
						  <option value="1">公司经营问题</option>
						  <option value="2">高管劣迹问题</option>
						  <option value="3">公司产品问题</option>
						  <option value="4">行业市场不景气</option>
						  <option value="x">以上都有</option>
						</select>		
					</div>
				</div>	
			  </div>	  
			  <div class="input-group">
			    <label for="evilTime" class="input-group-addon">劣迹发生时间</label>
			    <input type="text" class="form-control" id="evilTime" placeholder="劣迹发生时间" value="<?php echo date('Y-m-d')?>">
			  </div>
			  <div class="input-group">
			    <label for="evilDetail" class="input-group-addon">劣迹详细</label>
			    <input type="text" class="form-control" id="evilDetail" placeholder="劣迹详细" value="">
			  </div>			  
			  <button type="button" class="btn btn-default" id="submitBtn" >Submit</button>
			</form>
		<script type="text/javascript">
			seajs.config({
			  alias: {
			    $: 'https://a.alipayobjects.com/jquery/jquery/1.9.1/jquery.js'
			  }
			});
			seajs.use(['$','https://a.alipayobjects.com/arale/calendar/1.0.0/calendar.js','https://a.alipayobjects.com/arale/dialog/1.2.6/confirmbox.js'], function($,Calendar,ConfirmBox) {
				
				//console.log(MathRand());
				//$("#weixinName").val(MathRand());
				
			    new Calendar({trigger: '#luruTime'});

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
				    	$.post("evilUp.php",{
				    		evilCode:$('#evilCode').val(),
				    		evilName:$('#evilName').val(),
				    		luruTime:$('#luruTime').val(),
				    		evilTime:$('#evilTime').val(),
				    		evilType:$('#evilType').val(),
				    		evilDetail:$('#evilDetail').val()
						
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
