# About

收集A股上市公司的负面信息，信息来源于上深交所，微博，新闻等等

__注：此项目不用于任何商业用途。__


# 说明

>  如果对您对此项目有兴趣，可以点 "Star" 支持一下 谢谢！

>  开发环境 : macOS 10.13.6  PHP 7.1.23 

>  部署环境 :

>  如有问题请直接在 Issues 中提，或者您发现问题并有非常好的解决方案，欢迎 PR 👍

>  相关项目地址：[http://www.kapaidashu.org/evil/app.php](http://www.kapaidashu.org/evil/app.php)


## 技术栈

php + mysql + seajs + aralejs + es5 + bootstrap


## 项目运行


```
git clone git@github.com:tedQB/trading-evil-collect.git  

mac 可使用 MAMP PRO 进行预览

```


## 目标功能

- [x] 添加股票代码 -- 完成
- [x] 股票名称代码快速搜索 --完成
- [x] 添加股票名称 -- 完成
- [x] 添加劣迹事件 -- 完成
- [x] 添加事件后续影响 -- 完成
- [x] 添加公司公关内容 -- 完成
- [x] 管理员登陆 -- 完成
- [x] 处罚信息内容修改-- 完成
- [x] 部署上线 -- 完成

## 待实现功能

- [ ] 上深创处罚信息自动抓取 
- [ ] 数据JSONP化 
- [ ] 前端MVVM接入


## API接口文档

## 系统截图

## 项目布局

```
.
.
├── add.php                       添加信息
├── Db.class.php                  数据连接模型
├── login.php                     登陆  
├── index.html                    主页
├── app.php                       外网访问主页
├── evilHandleChange.php          股票信息修改接口
├── main.php                      登陆处理接口
├── evilDetailChange.php          股票信息修改接口
├── easyCRUD                      小型PHPCURD库
│   ├── easyCRUD.class.php
│   ├── index.php
│   └── Person.class.php
├── mimi.php                      秘密登陆入口
├── evilUp.php                    股票信息提交接口
├── out.php                       内部管理主页
├── login.html                    用户登陆出错跳转
├── registernormal.php            注册            
├── collectData.php               数据收集接口
├── README.md   
├── editUp.php                    编辑接口
├── settings.ini.php              数据库配置文件
├── logs                          日志文件
│   ├── 2018-01-15.txt
│   ├── 2018-01-16.txt
│   └── 2018-03-14.txt
├── deleteId.php                  删除接口
├── evilEffectChange.php          影响修改接口
├── edit.php                      编辑页面
├── evilCodeChange.php            股票代码修改接口
├── tree.txt
├── Log.class.php                 日志
├── pc.css                        
├── evilNameChange.php            股票名称修改接口
└── phone.css     
.

47 directories, 197 files

```

## License

[GPL](https://raw.githubusercontent.com/tedQB/trading-evil-collect/master/COPYING)
