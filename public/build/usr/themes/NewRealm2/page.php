<?php  
 // 评论Ajax翻页 by 牧风
if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){// Ajax请求的头数据   
    $this->need('comments.php');   
}else{   
    if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');   
    $this->need('header.php');   
?>
<div class="col-mb-12 col-12" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
    <div style="height:20px;"></div>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
<?php }?>