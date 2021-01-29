<?php
/**
 * 没什么过多的介绍，这是一款来自天空团设计的主题。
 * 
 * @package NewRealm 2
 * @author Tokin
 * @version 1.0
 * @link http://www.gsky.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="col-mb-12 col-12" id="main" role="main">
<?php while($this->next()): ?>
<?php if (($this->_currentPage == 1) && ($this->sequence == 1)): ?>
<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<ul class="post-meta">
<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
</ul>
<div class="post-content content_post" itemprop="articleBody">
<?php $this->content('- 阅读剩余部分 -'); ?>
</div>
<div style="height:30px;"></div>
</article>
<?php else: ?>
<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<ul class="post-meta">
<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
</ul>

<div class="post-content" itemprop="articleBody">
 <?php $this->excerpt(220, '...'); ?> 
</div>
<div style="height:25px;"></div>
</article>
<?php endif; ?>
<?php endwhile; ?>

<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>