<?php if (!defined('THINK_PATH')) exit();?><div class="media">
         <a href="#" class="pull-left">
            <img width="80" alt="媒体对象" src="images/touxiang.jpg" class="media-object img-circle">
         </a>
         <div class="media-body">
            <h4 class="media-heading">
              <span class="pull-left"><?php echo ($data["comm_title"]); ?></span>
              <time class="pull-right"><?php echo (date("Y/m/d H:i:s",$data["add_time"])); ?></time>
            </h4>
            <p><?php echo ($data["content"]); ?><a href="#">回复</a></p><br>
            <!-- <p>匿名:好</p> -->
            <!-- <p>匿名:很好</p> -->
            <!-- <p>匿名:非常好</p>          -->
          </div>
</div>