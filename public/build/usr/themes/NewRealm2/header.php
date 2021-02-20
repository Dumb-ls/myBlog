<!DOCTYPE HTML>
<html>
<head>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php $this->archiveTitle(array(
'category'=>_t('分类 %s 下的文章'),
'search'=>_t('包含关键字 %s 的文章'),
'tag' =>_t('标签 %s 下的文章'),
'author'=>_t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/functions.js'); ?>"></script>
<!--[if lt IE 9]>
<script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<?php $this->header(); ?>
</head>
<body>
<div id="pgcontainer">
<div style="background:url('<?php $this->options->themeUrl('img/banner-img.jpg'); ?>') fixed;background-size:cover;background-position:center center;">
<header id="header">
<div class="description container">
<form id="search" method="post" action="./" role="search">
<input type="text" name="s" class="text" placeholder="<?php $this->options->description() ?>" />
<button type="submit" class="submit">搜 索</button>
</form>
</div>

<!--[if lt IE 9]>
<div class="message error browsehappy" role="dialog">
当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>。
</div>
<![endif]-->

<!--电脑版导航菜单-->
<div class="topnav">
<div id="pc_nav">
<a id="logo" href="<?php $this->options->siteUrl(); ?>thelist.html">
<?php if ($this->options->logoUrl): ?>
<img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>"/>
<?php else: ?>
<?php $this->options->title(); ?>
<?php endif; ?>
</a>
<?php if(!$this->is('index')): ?>
<style>
.description{top:60%;}
@media(max-width:800px) {.description{top:55%;}}
@media(max-width:500px) {header{height:200px!important;}}
#pc_nav #logo img{width:60px;height:60px;margin:10px 0;box-shadow:0 0 0 3px #fff!important;}
</style>
<?php endif; ?>
<nav class="pc_menu">
<li class="<?php if(!$this->is('category')): ?>current<?php endif; ?>"><a href="<?php $this->options->siteUrl(); ?>">首 页</a></li>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
<?php endif; ?>
</nav>
</div>
<!--手机版导航菜单-->
<div id="navbar">
<span class="menubtn">MENU</span>
<nav id="hamburgermenu">
<div id="m_logo">
<a href="<?php $this->options->siteUrl(); ?>">
<?php if ($this->options->logoUrl): ?>
<img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>"/>
<?php else: ?>
<?php $this->options->title(); ?>
<?php endif; ?>
</a>
<p><?php $this->options->description() ?></p>
</div>
<li class="<?php if(!$this->is('category')): ?>current m_top<?php endif; ?>"><a href="<?php $this->options->siteUrl(); ?>">首 页</a></li>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
<?php endif; ?>
</nav>
</div>
</div>

<div class="overlay"></div>
<?php if($this->is('index')): ?>
<div id="header_img">
<div class="col-md-12" style="position:absolute;">
<img src="<?php $this->options->themeUrl('img/workspace@2x.png'); ?>" class="retina" alt="">
</div>
</div>
<script type="text/javascript">function onresize(){ var len = document.documentElement.clientHeight;$("#header").css("height",len + 'px');}; onresize();function img_b(){ var img_bottom = document.documentElement.clientHeight;$(".col-md-12").css("bottom","-"+img_bottom+'px');}; img_b();</script>
<?php endif; ?>
</header>
</div>

<div id="like_say_box">
<div id="like_say">
<ul>
<?php error_reporting(0);//禁止显示错误
$tip = $this->options->ac;$tip = str_replace("\r","",$tip);$tips = explode("\n",$tip);
if(is_array($tips)){foreach($tips as $tip){$str .= '<li>'.$tip.'</li>'."\n\r";}echo $str;}
?>
</ul>
</div>
<div class="like_say_remove">
<a title="关闭" href="javascript:void(0)" onclick="$(&#39;#like_say_box&#39;).slideUp(&#39;slow&#39;);"><span id="like_say_close">×</span></a>
</div>
</div>

<div class="container">