<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div style="background:url('<?php $this->options->themeUrl('img/banner-img.jpg'); ?>') fixed;background-size:cover;background-position:center center;">
<div class="col-mb-12 col-12 kit-hidden-tb" id="sidebar" role="complementary">
<div class="container">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget col-mb-4 s_new" style="float:left;">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget col-mb-4 s_new" style="float:left;">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments);//不含博主评论 ?>
        <?php //$this->widget('Widget_Comments_Recent')->to($comments);//包含博主评论版 ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

	<section class="widget col-mb-4" style="float:left;">
		<h3 class="widget-title"><?php _e('友情链接'); ?></h3>
            <ul class="links">
<li><a target="_blank" href="http://asheblog.org/">AsheBlog</a></li>
<li><a target="_blank" href="http://www.cmhello.com/">倡萌的自留地</a></li>
<li><a target="_blank" href="http://www.bgbk.org/">斌果博客</a></li>
<li><a target="_blank" href="http://da.ji8.me/">基吧山庄</a></li>
<li><a target="_blank" href="http://www.zuifengyun.com/">醉风云博客</a></li>
<li><a target="_blank" href="http://zhuweisheng.com.cn/">碎碎念</a></li>
<li><a target="_blank" href="http://xiedexu.cn/">DeXu.Xie&#8217;s</a></li>
<li><a target="_blank" href="http://www.mywpku.com/">WP主题</a></li>
<li><a target="_blank" href="http://eloxt.im/">Eloxt</a></li>
<li><a target="_blank" href="http://qiukong.com">秋空博客</a></li>
<li><a target="_blank" href="http://www.kuroko.us">颗粒Clear。</a></li>
            </ul>
	</section>

<div class="clearfix"></div>

<div class="ads">
<?php $this->options->SiteAD() ?>
<div class="clearfix"></div>
<ul>
<li><a href="http://www.longshianjiankong.com/" target="_blank">龙视安监控</a></li>
<li><a target="_blank" href="http://shuimucuibai.cnartka.com/">水木萃白官网</a></li>
<li><a target="_blank" href="http://www.ilangzi.com/">朗姿官网</a></li>
<li><a target="_blank" href="http://www.imengjie.com/">梦洁家纺旗舰店</a></li>
<li><a target="_blank" href="http://www.bidegaidi.net/">彼德盖帝皮鞋官网</a></li>
<li><a target="_blank" href="http://www.zhuoshini.org/">卓诗尼官方旗舰店</a></li>
<ul>
</div>

</div>
</div><!-- end #sidebar -->
</div>