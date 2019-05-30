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
	<!--
	<script type="text/javascript" src="http://www.jiese360.com/js/hammer.js"></script>	
	-->
	<style type="text/css">
		.input-group{margin:5px 0;}
		#search-box{ background:url(http://code.jquery.com/mobile/1.0a3/images/icon-search-black.png) 12px 8px no-repeat; padding-left: 38px; margin-bottom: 10px;  }
		.evilCode span{ display:block;  word-break: break-word;}
		.name span{ display:block; word-break: break-word;}
		.hasTime span{ display:block;  }
		.hasTime input{ width:50px; }
		.isShowOrNot{ display:block; }
		.pojieTime{ position: relative; }
		.pojieBt{ position: absolute; bottom:10px; left:5px; }
		.evilName,.name{ position: relative;}
		.evilName .isShowOrNot,.name .sex{ position: absolute; right:2px; top:2px; }
		.evilCode .modwx{ width:100px;  }
		.name .modwx{ width:100px;  }
		.hasDec{ color:red; }
		.rel{ position: relative;}
		.pos{ position: absolute; bottom:10px; } 
	</style>
</head>
	<body>		
<h1><a href="add.php">添加</a></h1>
<input type="text" class="form-control" placeholder="Text input" id="search-box">
<table class="table table-bordered">
	<thead>
		<tr>
			<td style="width:220px">操作</td>
			<td style="width:120px">录入时间</td>
			<td style="width:120px">股票代码</td>
			<td style="width:180px">股票名称</td>
			<td style="">劣迹事件详细</td>
			<td style="">事件后续影响</td>
			<td style="width:200px">公关处理</td>
		</tr>
	</thead>
	<tbody id="view-list">
<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();
  $result = $db->query("SELECT * FROM evil ORDER BY luruTime desc");
  foreach ($result as $key => $rs) {
  	if($rs['evilType']=='1'){ 
  		$evilType="公司经营问题";
  	}else if($rs['evilType']=='2'){ 
  		$evilType="高管劣迹问题";
  	}else if($rs['evilType']=='3'){ 
  		$evilType="公司产品问题";
  	}else if($rs['evilType']=='4'){ 
  		$evilType="行业市场不景气";
  	}else if($rs['evilType']=='x'){ 
  		$evilType="以上都有";
  	}else{ 
  		$evilType=$rs['evilType'];
  	}
?>
<tr>
	<td>
		<a data-id='<?=$rs['id']?>' href="edit.php?id=<?=$rs['id']?>" target="_blank">修改</a> 
		<span style="cursor:pointer" data-id='<?=$rs['id']?>' class="deleteId">删除</span> 
		<a href="userDetailAdd.php?id=<?=$rs['id']?>" class="<?=$hasDec ?>" target="_blank">详细资料添加</a>
	</td>
	<td class="luruTime">
		<?=$rs['luruTime']?><br />
		<?=$evilType ?>
	</td>
	<td class="evilCode">
		<span><?=$rs['evilCode']?></span>
		<input type="text" class="modwx" modid="<?=$rs['id']?>" />
		<button class="cgId">提交</button>
	</td><!--股票代码-->
	<td class="evilName">
		<span><?=$rs['evilName']?></span>
		<input type="text" class="modwx" modid="<?=$rs['id']?>" />
		<button class="cgId3">提交</button>		
	</td><!--股票名称-->	
	<td class="evilDetail rel">
		<span><?=$rs['evilTime']?> <span class="cont"><?=$rs['evilDetail']?></span></span>
		<div><a href="http://www.szse.cn/UpFiles/cfwj/<?=$rs['evilDisposeBook']?>" target="_blank"><?=$rs['evilDisposeBook']?></a></div>
		<div class="pos">
			<input type="text" class="modwx" modid="<?=$rs['id']?>" />
			<button class="cgId2">提交</button>
		</div>
	</td><!--事件影响-->
	<td class="evilEffect rel">
		<span><?=$rs['evilEffect']?></span>
		<div class="pos">
			<input type="text" class="modwx" modid="<?=$rs['id']?>" />
			<button class="cgId4">提交</button>
		</div>		
	</td><!--危机处理-->
	<td class="evilHandle rel">
		<span><?=$rs['evilHandle']?></span>
		<div class="pos">
			<input type="text" class="modwx" modid="<?=$rs['id']?>" />
			<button class="cgId5">提交</button>
		</div>			
	</td>
</tr>

 
<?php 	


		
	}
	
	
?>
	</tbody>
</table>
<span style="position: absolute; top:0px; right:0px; ">
<?php 
	 echo "共".count($result)."条处罚记录";
?>
</span>
<span style="position: absolute; top:0px; right:0px; ">

</span>

<div class="input-append">
    <input type="text" class="span2 search-query">
        <button type="submit" class="btn">Search</button>
</div>

		<script type="text/javascript">		
			var browser={ 
				versions:function(){ 
					var u = navigator.userAgent, app = navigator.appVersion; 
					return { //移动终端浏览器版本信息 
						trident: u.indexOf('Trident') > -1, //IE内核 
						presto: u.indexOf('Presto') > -1, //opera内核 
						webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核 
						gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核 
						mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端 
						ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端 
						android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器 
						iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器 
						iPad: u.indexOf('iPad') > -1, //是否iPad 
						webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部 
					}; 
				}(), 
				language:(navigator.browserLanguage || navigator.language).toLowerCase() 
			}; 
			seajs.config({
			  alias: {
			    $: 'https://a.alipayobjects.com/jquery/jquery/1.9.1/jquery.js'
			  }
			});	

			seajs.use(['$','https://a.alipayobjects.com/arale/dialog/1.2.6/confirmbox.js'], function($,ConfirmBox) { 
				var parentEle=$('#view-list');
				var elems=parentEle.find(".expires");
				parentEle.append(elems);
							
			/*更改投资品种代码*/
				$('.cgId').click(function(){ 
					var elem=$(this).prev();
					if(!elem.val()){ 
						alert("不能为空");
						return; 
					} 	
					$.post("evilCodeChange.php",{
			    		id:elem.attr('modid'),		
						evilCode:elem.val()
			    	},function(data){
						var data=eval('('+data+')');
			    		if(data.state=='sucess'){ 
							elem.prev().html(data.evilCode);							
						}
					})				
				
				})

			/*更改evil事件详细*/
				$('.cgId2').click(function(){ 
					var elem=$(this).prev();
					if(!elem.val()){ 
						alert("不能为空");
						return; 
					} 						
					$.post("evilDetailChange.php",{
			    		id:elem.attr('modid'),		
						evilDetail:elem.val()
			    	},function(data){
						var data=eval('('+data+')');
			    		if(data.state=='sucess'){ 
							elem.parent().prev().find('.cont').html(data.evilDetail);							
						}
					})				
				
				})
	
			/*更改投资品种名称*/
				$('.cgId3').click(function(){ 
					var elem=$(this).prev();
					if(!elem.val()){ 
						alert("不能为空");
						return; 
					} 						
					$.post("evilNameChange.php",{
			    		id:elem.attr('modid'),		
						evilName:elem.val()
			    	},function(data){
						var data=eval('('+data+')');
			    		if(data.state=='sucess'){ 
							elem.prev().html(data.evilName);							
						}
					})				
				})					
			/*事件后续影响*/									
				$('.cgId4').click(function(){ 
					var elem=$(this).prev();
					if(!elem.val()){ 
						alert("不能为空");
						return; 
					} 						
					$.post("evilEffectChange.php",{
			    		id:elem.attr('modid'),		
						evilEffect:elem.val()
			    	},function(data){
						var data=eval('('+data+')');
			    		if(data.state=='sucess'){ 
							elem.parent().prev().html(data.evilEffect);							
						}
					})				
				
				})		
			/*公关处理*/
				$('.cgId5').click(function(){ 
					var elem=$(this).prev();
					if(!elem.val()){ 
						alert("不能为空");
						return; 
					} 						
					$.post("evilHandleChange.php",{
			    		id:elem.attr('modid'),		
						evilHandle:elem.val()
			    	},function(data){
						var data=eval('('+data+')');
			    		if(data.state=='sucess'){ 
							elem.parent().prev().html(data.evilHandle);							
						}
					})				
				
				})								
				/*id会会员设置*/
				$(document).keypress(function(event){  
					if($('.arale-dialog-1_2_6').is(':visible')){	
					    var keycode = (event.keyCode ? event.keyCode : event.which);  
					    if(keycode == '13'||keycode=='32'){  
					       	$('.arale-dialog-1_2_6').remove(); 
					    }  
					}
				});  

				$('.deleteId').click(function(){ 
					//console.log($(this).attr('data-id'));
					var elem=$(this);
			    	var cb = new ConfirmBox({
				        trigger: '#dialog',
				        title: '成功提示',
				        message: "<div>确认删除？</div>",
				        confirmTpl: '<button class="ui-dialog-button-orange">确定</button>',
				        cancelTpl: '<button>取消</button>',
				        onConfirm:function(){ 
							var self=this;
							$.post("deleteId.php",{
					    		id:elem.attr('data-id')					
					    	},function(data){
					    		if(data=='sucess'){ 
								    elem.closest('tr').slideUp();									
					    		}
					    		self.hide();
					    	})				        	
				        }

			    	}).show();									

				});


				if(browser.versions.android){
					$('#search-box').hammer({}).bind('tap',function(ev){ 
						var val=$(this).val()
						var reg= new RegExp(val,'g');
						
						$('#view-list').find('.evilName').each(function(i,obj){ 
							//$(obj).html($(obj).html().replace(/(\s*)/g, ""));
							var elem=$(obj).html();
							var elemId=$(obj).prev().prev().html();
							var parenLi=$(obj).closest('tr');
							if(!reg.test(elem)){ 
								if(!reg.test(elemId)){
									parenLi.hide();
								}
							}else{ 
								parenLi.show();
							}
						})
						//$(this).val(val);														
					});

					$('#search-box').keyup(function(){ 

						var val=$(this).val()
						var reg= new RegExp(val,'g');
						
						$('#view-list').find('.evilName').each(function(i,obj){ 
							//$(obj).html($(obj).html().replace(/(\s*)/g, ""));
							var elem=$(obj).html();
							var elemId=$(obj).prev().prev().html();
							var parenLi=$(obj).closest('tr');
							if(!reg.test(elem)){ 
								if(!reg.test(elemId)){
									parenLi.hide();
								}
							}else{ 
								parenLi.show();
							}
						})
						//$(this).val(val);					

					});					
				}else{				
					$('#search-box').keyup(function(){ 

						var val=$(this).val()
						var reg= new RegExp(val,'g');

						setTimeout(function(){  
							$('#view-list').find('.evilName').each(function(i,obj){ 
								//$(obj).html($(obj).html().replace(/(\s*)/g, ""));
								var elem=$(obj).html();
								var elemId=$(obj).prev().html();
								var parenLi=$(obj).closest('tr');
								if(!reg.test(elem)){ 
									if(!reg.test(elemId)){
										parenLi.hide();
									}
								}else{ 
									parenLi.show();
								}
							})
						//$(this).val(val);					
						},1000);
					});
				}


			});
			
		</script>

	</body>
	
</html>
