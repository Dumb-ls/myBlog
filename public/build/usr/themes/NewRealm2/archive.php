<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-12" id="main" role="main">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 “%s” 下的文章'),
            'search'    =>  _t('包含关键字 “%s” 的文章'),
            'tag'       =>  _t('标签 “%s” 下的文章'),
            'author'    =>  _t('“%s” 发布的文章')
        ), '', ''); ?></h3>
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