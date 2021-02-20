<?php
/**
* 榜上有名
*
* @package custom
*/
if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){
    $this->need('comments.php');   
}else{   
    if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');   
    $this->need('header.php');   
?>

<div class="col-mb-12 col-12" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div class="readerwall" itemprop="articleBody">
            <?php echo getFriendWall();?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
    <div style="height:20px;"></div>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
<?php }?>