<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <base href="/Public/Admin/">
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">友链管理</span></div>
        </div>

        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('Friend/add');?>"><i class="icon-font"></i>新增友链</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>LOGO</th>
                            <th>友链名</th>
                            <th>友链地址</th>
                            <th>操作</th>
                        </tr>
                    <?php if(is_array($linkList)): foreach($linkList as $key=>$val): ?><tr id="tr_<?php echo ($val["link_id"]); ?>">
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="<?php echo ($val["sort"]); ?>" type="text">
                            </td>
                            <td><?php echo ($val["link_id"]); ?></td>
                            <td><?php echo ($val["link_logo"]); ?></td>
                            <td><a target="_blank" href="#" title="<?php echo ($val["link_name"]); ?>"><?php echo ($val["link_name"]); ?></a>
                            </td>

                            <td><?php echo ($val["link_url"]); ?></td>
                            <td>
                                <a class="link-update" href="<?php echo U('Friend/editor',array('lid'=>$val['link_id']));?>">修改</a> | 
                                <a class="link-del" onclick="catDelete(<?php echo ($val["cat_id"]); ?>)" href="javascript:void(0):">删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                    <div class="list-page"> <?php echo ($show); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
<!-- <script src="js/jquery.1.12.min.js"></script> -->
<script>
    // $(function(){
    //     $('.link-del').click(function(){
    //         $(this).parents("tr").remove();
    //     })
    // })

    function catDelete(aid)
    {
        var bool = window.confirm("您确认要删除吗？");
        if(bool)
        {
            var xhr = new XMLHttpRequest();
            var url = '/index.php/Admin/Friend/delete/aid/'+aid;
            xhr.open('get',url);
            xhr.send();
            xhr.onreadystatechange = function()
            {
                if(xhr.status == 200 && xhr.readyState == 4)
                {
                    var result = xhr.responseText;
                    if(result == 1)
                    {
                        document.getElementById("tr_"+aid).remove();
                    }
                    else if(result == 0)
                    {
                        alert('删除失败');
                    }
                    else
                    {
                        alert('该分类下有文章，请先转移文章再执行删除');
                    }
                }
            }
        }
    }

</script>
</html>