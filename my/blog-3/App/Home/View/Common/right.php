<aside class="right"> 
      <div class="my">
        <h2>关于<span>博主</span></h2>
        <div id="my_img"></div>
        <ul>
            <li>博主：安然</li>
            <li>职业:web前端、网站运营、PHP</li>
            <li>简介：一个不断学习和研究，web前端和SEO,PHP技术的90后草根站长.</li>
        </ul>
      </div>
      <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
      <div class="news">
        <h3 class="ph">
          <p>点击<span>排行</span></p>
        </h3>
        <ul class="paih">
          <?php 
              // 实例化文章模型
              $arcModel = new \Common\Model\Arc;
              // 获取点击次数最多的五篇文章
              $arcData = $arcModel->limit(5)->orderBy('click','DESC')->get();
          ?>
          {{foreach from='$arcData' value='$v'}}
          <li><a href="c_{{$v['aid']}}.html" target="_blank" title="{{$v['title']}}" target="_blank">{{$v['title']}}</a></li>
          {{endforeach}}
        </ul>
        <h3>
          <p>用户<span>关注</span></p>
        </h3>
        <ul class="rank">
        <?php 
        // 获取按aid排序的文章
            $arcData = $arcModel->limit(5)->orderBy('aid','ASC')->get();
         ?>
        {{foreach from='$arcData' value='$v'}}
          <li><a href="c_{{$v['aid']}}.html" title="{{$v['title']}}" target="_blank">{{$v['title']}}</a></li>
        {{endforeach}}
        </ul>
        <h3 class="links">
          <p>友情<span>链接</span></p>
        </h3>
        <ul class="website">
           <?php 
            // 实例化友情连接表
            $linkModel = new \Common\Model\Link;
            // 获取友情连接表的数据
            $linkData = $linkModel->get();
             ?>
        {{foreach from='$linkData' value='$v'}}
          <li><a href="{{$v['url']}}" target="_blank">{{$v['lname']}}</a></li>
        {{endforeach}}
        </ul> 
      </div>
  </aside>
</article>
