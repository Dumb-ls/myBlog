<?php
/**
 * 空间混合体
 * 
 * @package Mix
 * @author Wibus
 * @version 1.3.2
 * @link https://blog.iucky.cn
 */
require_once ("Core/globals.php"); //$GLOBALS
?>



<!--头部必要元素-->
<?php $this->need('header.php'); ?>


<!--顶部分类配件-->
<?php $this->need('component/headnav.php'); ?>
<div id="main_load">
<main>
<!--顶部最大头像以及附属svg-->
<?php $this->need('component/area-head.php'); ?>

<!--显示所有分类&文章-->
<?php $this->need('component/cate-article.php'); ?>

<?php if (!empty($this->options->Show_what) && in_array('ShowMore', $this->options->Show_what)): ?>
<!--更多输出配件-->
<?php $this->need('component/more.php'); ?>
<?php endif; ?>
</div>
</section>
</main>
</div>

<!--必要底部元素-->
<?php $this->need('footer.php'); ?>