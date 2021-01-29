 <head lang="zh-cn">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="next-head-count" content="9">

  <link href="https://cdn.bootcss.com/font-awesome/5.13.0/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php $this->options->themeUrl()?>assets/css/style1.css" data-n-g="">
  <link rel="stylesheet" href="<?php $this->options->themeUrl()?>assets/css/Super_Code_UI.css">
  <link rel="stylesheet" href="<?php $this->options->themeUrl()?>assets/css/style2.css" data-n-p="">
  <link rel="stylesheet" href="<?php $this->options->themeUrl()?>assets/css/fa-svg.css" data-n-p="">
  <link href="<?php $this->options->themeUrl()?>assets/css/other.css" rel="stylesheet" type="text/css">
  <link href="<?php $this->options->themeUrl()?>assets/css/OperatorMono.css" rel="stylesheet" type="text/css">
  <link href="<?php $this->options->themeUrl()?>assets/css/comment.css" rel="stylesheet" type="text/css">
  <meta itemprop="image" content="<?php $this->options->HeaderPhoto();?>" />
  <!--<link href="<?php $this->options->themeUrl()?>assets/kico.css" rel="stylesheet" type="text/css">-->
    <script src="https://cdn.jsdelivr.net/gh/Dreamer-Paul/Kico-Style/kico.min.js"></script>
<script src="<?php $this->options->themeUrl()?>assets/js/pre.js"></script>
<script>ks.image("img");</script>
  <style><?php $this->options->CSS(); ?></style>
  </head>
<?php $this->header(); ?>
<?php $this->options->HeaderHTML(); ?>