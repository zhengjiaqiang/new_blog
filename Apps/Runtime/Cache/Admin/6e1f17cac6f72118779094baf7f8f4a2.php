<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <base href="/new_blog/Public/Admin/">
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<!-- 顶部导航 -->
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="http://www.jscss.me">管理员</a></li>
                <li><a href="<?php echo U('Admin/editorAdmin');?>">修改密码</a></li>
                <li><a href="http://www.jscss.me">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <!-- 左侧菜单栏 -->
        <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Article/index');?>"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                        <li><a href="<?php echo U('Article/recoverList');?>"><i class="icon-font">&#xe019;</i>回收站</a></li>
                        <li><a href="<?php echo U('Category/index');?>"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="<?php echo U('Friend/index');?>"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Sys/config');?>"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="<?php echo U('Article/index');?>" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="cat_id" id="">
                                    <option value="">全部</option>
                                    <?php if(is_array($catList)): foreach($catList as $key=>$val): ?><option value="<?php echo ($val["cat_id"]); ?>" <?php if($val['cat_id'] == $cat_id): ?>selected<?php endif; ?>><?php echo ($val["cat_name"]); ?></option><?php endforeach; endif; ?>
                                </select>

                            </td>
                            <th width="70">标题:</th>
                            <td><input class="common-text" placeholder="关键字" name="title" value="<?php echo ($title); ?>" id="" type="text"></td>
                            <!--
							<th width="70">标签:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">php</option><option value="20">mysql</option>
                                </select>
                            </td>
                            -->
                            <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('Article/add');?>"><i class="icon-font"></i>新增博文</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"> ID</th>
                            <th>排序</th>
                            <th>标题</th>
                            <th>分类</th>
                            <!-- <th>审核状态</th> -->
                            <th>阅读量</th>
                            <th>点赞量</th>
                            <th>发布人</th>
                            <th>发布时间</th>
                            <th>评论</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($artList)): foreach($artList as $key=>$value): ?><tr>
                            <td class="tc"><input name="id[]" value="<?php echo ($value["art_id"]); ?>" type="checkbox"> <?php echo ($value["art_id"]); ?></td>
                            <td>
                                <input name="ids[]" value="<?php echo ($value["sort"]); ?>" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="<?php echo ($value["sort"]); ?>" type="text">
                            </td>
                            <td title="<?php echo ($value["title"]); ?>"><a target="_blank" href="#" title="<?php echo ($value["title"]); ?>"><?php echo ($value["title"]); ?></a>
                            </td>
                            <td><?php echo ($value["cat_name"]); ?></td>
                            <!-- <td>0</td> -->
                            <td><?php echo ($value["read_num"]); ?></td>
                            <td><?php echo ($value["click_num"]); ?></td>
                            <td><?php echo ($value["author"]); ?></td>
                            <td><?php echo date('Y/m/d H:i:s',$value['add_time']);?></td>
                            <td></td>
                            <td>
                                <i class="icon-font"></i>
                                <a class="link-update" href="#">还原</a> | 
                                <a class="link-del" art_id="<?php echo ($value["art_id"]); ?>" href="javascript:void(0);">彻底删除</a>
                                <!--
                                <a class="link-del" art_id="<?php echo ($value["art_id"]); ?>" href="javascript:void(0);">删除</a>
                                -->
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                    <div class="list-page"> 
                    <?php echo ($show); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
<script src="js/jquery.1.12.min.js"></script>

<script>
    // 还原
    
    // 删除
    $(".link-del").click(function(){
        var bool = window.confirm("您确认要彻底删除吗？");
        if(!bool)
        {
            return false;
        }
        var art_id = $(this).attr("art_id");
        var url = "<?php echo U('Article/delete');?>";
        var _this = $(this);
        $.get(url,{'art_id':art_id},function(result){
            // console.log(result);
            if(result.status)
            {
               _this.parents("tr").remove();
            }
            else
            {
                alert(result.err_msg);
            }
        },'json')

        
    })
</script>
</html>