 <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div>

<?php $this->need('sidebar.php'); ?>

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
//A-Blank-1
jQuery(document).ready(function(){jQuery("a[rel='external'],a[rel='external nofollow']").click(function(){window.open(this.href);return false})});
//Go Top
$(".back2top").hide();$(window).scroll(function(){if($(this).scrollTop()>200){$(".back2top").fadeIn(100)}else{$(".back2top").fadeOut(200)}});$(".back2top a").click(function(){$("body,html").animate({scrollTop:0},400);return false});
//Comments AJAX
jQuery(document).ready(function($){var comments=$("#comments"),loadingText="正在AJAX翻页，请稍候...",ajaxed=false;comments.on("click", ".page-navigator li a", function(e){e.preventDefault();var _this=$(this),_thisP=_this.parent();if(_thisP.hasClass('current')||ajaxed==true)return;var _list=$('.comment-list'),url=_this.attr("href").replace("#comments","")+"?action=ajax_comments";$.ajax({url:url,beforeSend:function(){_list.text(loadingText);ajaxed=true},success:function(data){comments.html(data);ajaxed=false}});return false})}); 
//DropDown
$("#dropdown p").click(function(){var ul=$("#dropdown ul");if(ul.css("display")=="none"){ul.slideDown("fast")}else{ul.slideUp("fast")}});$("#dropdown ul li a").click(function(){var txt=$(this).text();$("#dropdown p").html();$("#dropdown ul").hide()});

</script>
</body>
</html>
</body>
</html>