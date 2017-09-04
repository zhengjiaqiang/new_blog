<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>view-黑色时间轴个人博客模板</title>
<base href="/Public/Home/">
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
<link href="css/styles.css" rel="stylesheet">
<link href="css/view.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
<!-- 导航 -->
  <nav id="nav">
    <ul>
      <li><a href="/" >网站首页</a></li>
      <?php if(is_array($catList)): foreach($catList as $key=>$val): ?><li><a href="<?php echo ($val["url"]); ?>" target="_blank" title="<?php echo ($val["cat_name"]); ?>"><?php echo ($val["cat_name"]); ?></a></li><?php endforeach; endif; ?>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>

</header>
<!--header end-->
<div id="mainbody">
  <div class="blogs">
    <div id="index_view">
      <ol class="breadcrumb">
        <li><a href="<?php echo U('Index/index');?>">首页</a></li>
        <li class="active"><?php echo ($catInfo["cat_name"]); ?></li>
      </ol>
      <h1 class="c_titile"><?php echo ($artInfo["title"]); ?></h1>
      <p class="box">发布时间：<?php echo (date("Y/m/d",$artInfo["add_time"])); ?><span>编辑：<?php echo ($artInfo["author"]); ?></span>阅读（<?php echo ($artInfo["read_num"]); ?>）</p>
      <ul>
        <?php echo ($artInfo["content"]); ?>
      </ul>

      <div id="social">
        <div class="social-main">
          <span class="like">
          <a href="javascript:;" id="ding" data-action="ding" data-id="<?php echo ($artInfo["art_id"]); ?>" title="我赞" class="favorite done"><i class="fa fa-thumbs-up"></i>赞 <i class="count"><?php echo ($artInfo["click_num"]); ?></i>
          </a>
          </span>
          <span class="shang-p">
            <span class="tipso_style" id="tip-p">
              <span class="shang-s"><a title="打赏《<?php echo ($artInfo["title"]); ?>》">赏</a></span>
            </span>
          </span>
          <span class="share-sd">
            <span class="share-s"><a href="javascript:void(0)" id="share-s" title="分享"><i class="fa fa-share-alt"></i>分享</a></span>
          </span>
          <div class="clear"></div>
        </div>
      </div>  
      
      <!-- 发表评论 -->
      <div id="comment">
        <h3><strong>发表评论:</strong></h3>
        <p>
          <span>标题：</span>
          <input type="text" name="" id="comm_title" class="text">
        </p>
        <p><span>内容：</span><textarea rows="10" id="content" cols="30" class="text-textarea"></textarea></p>
        <p style="text-align:right;"><button class="btn">发表</button></p>
      </div>
      
      <!-- 评论列表 -->
    <?php if(is_array($comList)): foreach($comList as $key=>$value): ?><div class="media">
         <a class="pull-left" href="#">
            <img class="media-object img-circle" src="images/touxiang.jpg" alt="媒体对象" width="80">
         </a>
         <div class="media-body">
            <h4 class="media-heading">
              <span class="pull-left"><?php echo ($value["comm_title"]); ?></span>
              <time class="pull-right"><?php echo ($value["add_time"]); ?></time>
            </h4>
            <p><?php echo ($value["content"]); ?><a href="javascript:void(0);" class="reply">回复</a></p>
            <br>
            <div style="display:none;">
              
              <textarea name="" cols="50" rows="2"></textarea>
              <input type="button" class="replyBtn" data-id="<?php echo ($value["comm_id"]); ?>" value="提交">
            </div>
            <?php if(is_array($value['reply'])): foreach($value['reply'] as $key=>$val): ?><p>匿名:<?php echo ($val["reply_text"]); ?></p><?php endforeach; endif; ?>
         </div>
      </div><?php endforeach; endif; ?>
      
    </div>
    <!--bloglist end-->
    <aside>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      <div class="sunnav">
        <ul>
          <li><a href="/web/" target="_blank" title="网站建设">网站建设</a></li>
          <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">HTML5 / CSS3</a></li>
          <li><a href="/jstt/" target="_blank" title="技术探讨">技术探讨</a></li>
          <li><a href="/news/s/" target="_blank" title="慢生活">慢生活</a></li>
        </ul>
      </div>
      <!-- 推荐文章 -->
      <div class="tuijian">
<h2>推荐文章</h2>
<ol>
<?php if(is_array($recomList)): foreach($recomList as $key=>$art): ?><li><span><strong><?php echo ($key+1); ?></strong></span><a href="<?php echo U('Article/show',array('aid'=>$art['art_id']));?>"><?php echo ($art["title"]); ?></a>
  </li><?php endforeach; endif; ?>
</ol>
</div>
      <!--
      <div class="toppic">
        <h2>图文并茂</h2>
        <ul>
          <li><a href="/"><img src="images/k01.jpg">腐女不可怕，就怕腐女会画画！
            <p>伤不起</p>
            </a></li>
          <li><a href="/"><img src="images/k02.jpg">问前任，你还爱我吗？无限戳中泪点~
            <p>感兴趣</p>
            </a></li>
          <li><a href="/"><img src="images/k03.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。
            <p>喜欢</p>
            </a></li>
        </ul>
      </div>
      -->
      <!-- 热门文章 -->
      <div class="clicks">
<h2>热门点击</h2>
<ol>
<?php if(is_array($hotArt)): foreach($hotArt as $key=>$art): ?><li><span><a href="<?php echo U('Cat/index',array('cid'=>$art['cat_id']));?>"><?php echo ($art["cat_name"]); ?></a></span><a href="<?php echo U('Article/show',array('aid'=>$art['art_id']));?>"><?php echo ($art["title"]); ?></a></li><?php endforeach; endif; ?>
</ol>
</div>

    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->

<!-- 底部 -->
<footer>
  <div class="footer-mid">
    <div class="links">
      <h2>友情链接</h2>
      <ul>
      <?php if(is_array($linkList)): foreach($linkList as $key=>$val): ?><li><a href="<?php echo ($val["link_url"]); ?>" target="_blank"><?php echo ($val["link_name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
    <div class="visitors">
      <h2>最新评论</h2>
      <dl>
        <dt><img src="images/s8.jpg">
        <dt>
        <dd>DanceSmile
          <time>49分钟前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-07-28/530.html" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
        <dd>文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</dd>
      </dl>
      <dl>
        <dt><img src="images/s7.jpg">
        <dt>
        <dd>yisa
          <time>2小时前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/news/s/2013-07-31/533.html" class="title">芭蕾女孩的心事儿</a>中评论：</dd>
        <dd>我手机里面也有这样一个号码存在</dd>
      </dl>
      <dl>
        <dt><img src="images/s6.jpg">
        <dt>
        <dd>小林博客
          <time>8月7日</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-06-18/285.html" class="title">如果个人博客网站再没有价值，你还会坚持吗？ </a>中评论：</dd>
        <dd>博客色彩丰富，很是好看</dd>
      </dl>
    </div>
    <section class="flickr">
      <h2>摄影作品</h2>
      <ul>
        <li><a href="/"><img src="images/01.jpg"></a></li>
        <li><a href="/"><img src="images/02.jpg"></a></li>
        <li><a href="/"><img src="images/03.jpg"></a></li>
        <li><a href="/"><img src="images/04.jpg"></a></li>
        <li><a href="/"><img src="images/05.jpg"></a></li>
        <li><a href="/"><img src="images/06.jpg"></a></li>
        <li><a href="/"><img src="images/07.jpg"></a></li>
        <li><a href="/"><img src="images/08.jpg"></a></li>
        <li><a href="/"><img src="images/09.jpg"></a></li>
      </ul>
    </section>
  </div>
  <div class="footer-bottom">
    <p>Copyright 2013 Design by <a href="http://www.yangqq.com">DanceSmile</a></p>
  </div>
</footer>

<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>

<script>
  // 點讚
  $("#ding").click(function(){
    var _this = $(this);
    var url = "<?php echo U('Article/clickNum');?>";
    var art_id = _this.attr("data-id");
    $.get(url,{'art_id':art_id},function(result){
      // console.log(result);
      if(result.error)
      {
        // 变灰色
        _this.css("background","#878787");

        $(".count").text(result.num);
      }
      else
      {
        alert(result.msg);
      }
    },'json')
  })

  // 發表評論
  $(".btn").click(function(){
    var title = $("#comm_title").val();
    var content = $("#content").val();
    var art_id = "<?php echo ($artInfo["art_id"]); ?>";
    $.ajax({
      type:'POST',
      url:"<?php echo U('Article/comment');?>",
      data:"comm_title="+title+"&content="+content+"&art_id="+art_id,
      success:function(res)
      {
        $("#comment").after(res);
        // alert(res);
        $("#comm_title").val('');
        $("#content").val('');
      }

    })
  })

  // 展示回復框
  $(".reply").click(function(){
    $(this).parent().next().next().toggle('slow');

  })

  //提交回復
  $(".replyBtn").click(function(){
    var _this = $(this);
    var reply_text = _this.prev().val();
    var comm_id = _this.attr("data-id");
    var url = "<?php echo U('Article/reply');?>";
    $.get(url,{'reply_text':reply_text,'comm_id':comm_id},function(result){
      // console.log(result);
      if(result)
      {
        var html ="<p>匿名："+reply_text+"</p>";
        _this.after(html);
      }
      else
      {
        alert('回復失敗');
      }
    })

  })
</script>
</html>