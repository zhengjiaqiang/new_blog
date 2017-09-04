<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>黑色时间轴个人博客模板</title>
<base href="/Public/Home/">
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
<link href="css/styles.css" rel="stylesheet">
<link href="css/animation.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
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

  <div style="height:10px;background:#000;border-radius:10px;margin:5px 0;"></div>

  <div class="blogs">
    <ul class="bloglist">
    <?php if(is_array($artList)): foreach($artList as $key=>$val): ?><li>
        <div class="arrow_box">
          <div class="ti"></div>
          <!--三角形-->
          <div class="ci"></div>
          <!--圆形-->
          <h2 class="title"><a href="/" target="_blank"><?php echo ($val["title"]); ?></a></h2>
          <ul class="textinfo">
            <a href="/"><img src="images/s1.jpg"></a>
            <p><?php echo ($val["short_desc"]); ?></p>
          </ul>
          <ul class="details">
            <li class="likes"><a href="#"><?php echo ($val["click_num"]); ?></a></li>
            <li class="comments"><a href="#">34</a></li>
            <li class="icon-time"><a href="#"><?php echo (date("Y/m/d H:i:s",$val["add_time"])); ?></a></li>
          </ul>
        </div>
        <!--arrow_box end--> 
      </li><?php endforeach; endif; ?>
    </ul>
    <!--bloglist end-->
    <aside>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onFocus="this.value=''" onBlur="this.value='Search'">
        </form>
      </div>
      
      <!-- 推荐文章 -->
      <div class="tuijian">
<h2>推荐文章</h2>
<ol>
<?php if(is_array($recomList)): foreach($recomList as $key=>$art): ?><li><span><strong><?php echo ($key+1); ?></strong></span><a href="<?php echo U('Article/show',array('aid'=>$art['art_id']));?>"><?php echo ($art["title"]); ?></a>
  </li><?php endforeach; endif; ?>
</ol>
</div>

      <!-- 热门文章 -->
      <div class="clicks">
<h2>热门点击</h2>
<ol>
<?php if(is_array($hotArt)): foreach($hotArt as $key=>$art): ?><li><span><a href="<?php echo U('Cat/index',array('cid'=>$art['cat_id']));?>"><?php echo ($art["cat_name"]); ?></a></span><a href="<?php echo U('Article/show',array('aid'=>$art['art_id']));?>"><?php echo ($art["title"]); ?></a></li><?php endforeach; endif; ?>
</ol>
</div>


      <div class="viny">
        <dl>
          <dt class="art"><img src="images/artwork.png" alt="专辑"></dt>
          <dd class="icon-song"><span></span>南方姑娘</dd>
          <dd class="icon-artist"><span></span>歌手：赵雷</dd>
          <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
          <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
          <dd class="music">
            <audio src="images/nf.mp3" controls></audio>
          </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>
    </aside>
  </div>
  <!--blogs end--> 
  <!-- 分页 -->
  <div class="page">
    <div class="list-page">
    <?php echo ($show); ?>
    </div>
  </div>
  
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
</html>