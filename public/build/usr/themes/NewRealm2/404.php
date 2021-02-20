<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="UTF-8" />
<meta name="robots" content="none" />
<TITLE>404 Not Found</TITLE>
<style>
*{color:#fff;color:#000 \9;font-family:"Microsoft Yahei","宋体",Tahoma,Helvetica,Arial,"SimSun",sans-serif;font-weight:normal;margin:0;}
h1{font-size:100px;}
#hb{background:none;background:rgba(0, 0, 0, 0.2);}
table{width:100%;height:100%;border:0px;}
td{text-align:center;}
img{border:0;border:4px solid #ccc;}
img:hover{opacity:.5;}
a{text-decoration:none;}
a:hover{text-decoration: underline;}
</style>
</HEAD>
<BODY style="background:url('<?php $this->options->themeUrl('img/banner-img.jpg'); ?>') fixed;background-size:cover;background-position:center center;">
<div id="hb">
<table cellspacing="0" cellpadding="0">
<tr>
<td><table cellspacing="0" cellpadding="0">
<tr>
<td><h1>404</h1>
大事不妙啦！你访问的页面被博主不小心给弄丢了~.~<br/><br/>
<a href="<?php $this->options->siteUrl(); ?>">惩罚博主 ></a><br/><br/>
</td>
</tr>
</table></td>
</tr>
</table>
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
function onresize(){ var len = document.documentElement.clientHeight;$("#hb").css("height",len + 'px');}; onresize();
</script>
</BODY>
</HTML>