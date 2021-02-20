 <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div>
<div class="container">
<footer id="footer" role="contentinfo">
<nav class="footer_page">
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
<?php endwhile; ?>
</nav>
<hr class="f_bottom">
<div class="clearfix"></div>
<div class="left">
&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> . <?php $this->options->SiteICP() ?>
</div>
<div class="right">
由 <a target="_blank" href="http://www.gsky.org">NewRealm 2</a> . <a target="_blank" href="http://www.typecho.org">Typecho</a> 联合驱动
</div>
<div class="clearfix"></div>
</footer><!-- end #footer -->
</div>
<div class="back2top"><a></a></div>
<?php $this->footer(); ?>
<script type="text/javascript">
//A-Blank-2
jQuery(document).ready(function($){$('.post-content a').attr({ target:"_blank"})});
//Nav-Fixed
$(document).ready(function(){t=$('.topnav').offset().top;$(window).scroll(function(){s=$(document).scrollTop();if(s>t){$('.topnav').addClass('nav_fixed')}else{$('.topnav').removeClass('nav_fixed')}})});
//likesay
function AutoScroll(obj){ 
$(obj).find("ul:first").animate({ marginTop:"-50px" },1000,function(){ 
$(this).css({marginTop:"0px"}).find("li:first").appendTo(this); }); } 
$(document).ready(function() {var myar = setInterval('AutoScroll("#like_say")', 5000)
$("#like_say").hover(function() { clearInterval(myar); }, 
function() { myar = setInterval('AutoScroll("#like_say")', 5000) });});
//Go Top
$(".back2top").hide();$(window).scroll(function(){if($(this).scrollTop()>200){$(".back2top").fadeIn(100)}else{$(".back2top").fadeOut(200)}});$(".back2top a").click(function(){$("body,html").animate({scrollTop:0},400);return false});
//DropDown
$("#dropdown p").click(function(){var ul=$("#dropdown ul");if(ul.css("display")=="none"){ul.slideDown("fast")}else{ul.slideUp("fast")}});$("#dropdown ul li a").click(function(){var txt=$(this).text();$("#dropdown p").html();$("#dropdown ul").hide()});

</script>
</body>
</html>
</body>
</html>