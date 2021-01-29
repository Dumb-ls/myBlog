<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require("libs/libs.php"); //Tool
require("libs/functions_helper.php"); //function
require_once("libs/plugins_helper.php"); //Plugins

/*
 * 模板编辑外观设置
 * themeConfig($form){}控制
 */

function themeConfig($form) {
    $hosturl = $_SERVER['HTTP_HOST'];
    $check_host = 'https://api.iucky.cn/plugins/update/Mix.php';
    $check_message = $check_host . '?a=V1.3.2&u=' . $_SERVER['HTTP_HOST'];
    $message_json = file_get_contents($check_message);
    $json_W = json_decode($message_json);
    $version = $json_W->{'version'};
    $message = $json_W->{'message'};
    $m_ver = '1.3.2';
    if (!$_POST) {
        echo ' 
   <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.staticfile.org/jquery/2.0.0/jquery.js"></script>
   <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<hr>
   <p class="active-tab"><strong><svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-project"></use></svg> Mix 双重空间混合体</strong> <span></span></p>
   <p class="previous-tab"><strong><svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-chicken"></use></svg> 主题版本号: </strong>'.$m_ver.' <span></span></p>
<hr>
<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#home" data-toggle="tab">版本与特性</a></li>
   <li><a href="#ios" data-toggle="tab">备份与恢复</a></li>
   <li><a href="#ejb" tabindex="-1" data-toggle="tab">关于主题</a></li> 
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
      <p>
      
      ';
    }
    if ($m_ver == $version) {
        echo '当前版本：' . 'V' . $m_ver . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '最新版本:' . 'V' . $version;
    } else if ($v_time > $message) {
        echo '当前版本：' . 'V' . $m_ver . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . 'V' . $version;
    } else if ($v_time < $message) {
        echo '当前版本：' . 'V' . $m_ver . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '发现新版本:' . '<span style="color:red;"><b>V ' . $version. '</b></span>&nbsp&nbsp请更新<a href="https://iucky.cn/posts/things/how-to-develop-mix-typecho" target="_blank">新版本特性</a>';
    }
    if (!$_POST) {
        echo '
        </p>
   </div>
   <div class="tab-pane fade" id="ios">
      <p>
    ';
    }
    $str1 = explode('/themes/', Helper::options()->themeUrl);
    $str2 = explode('/', $str1[1]);
    $name = $str2[0];
    $db = Typecho_Db::get();
    $sjdq = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name));
    $ysj = $sjdq['value'];
    if (isset($_POST['type'])) {
        if ($_POST["type"] == "备份模板设置数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $update = $db->update('table.options')->rows(array('value' => $ysj))->where('name = ?', 'theme:' . $name . 'bf');
                $updateRows = $db->query($update);
                echo '<div class="tongzhi col-mb-12 home">备份已更新，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
            } else {
                if ($ysj) {
                    $insert = $db->insert('table.options')->rows(array('name' => 'theme:' . $name . 'bf', 'user' => '0', 'value' => $ysj));
                    $insertId = $db->query($insert);
                    echo '<div class="tongzhi col-mb-12 home">备份完成，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
                }
            }
        }
        if ($_POST["type"] == "还原模板设置数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $sjdub = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'));
                $bsj = $sjdub['value'];
                $update = $db->update('table.options')->rows(array('value' => $bsj))->where('name = ?', 'theme:' . $name);
                $updateRows = $db->query($update);
                echo '<div class="tongzhi col-mb-12 home">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
<?php
            } else {
                echo '<div class="tongzhi col-mb-12 home">没有模板备份数据，恢复不了哦！</div>';
            }
        }
        if ($_POST["type"] == "删除备份数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $delete = $db->delete('table.options')->where('name = ?', 'theme:' . $name . 'bf');
                $deletedRows = $db->query($delete);
                echo '<div class="tongzhi col-mb-12 home">删除成功，请等待自动刷新，如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
            } else {
                echo '<div class="tongzhi col-mb-12 home">不用删了！备份不存在！！！</div>';
            }
        }
    }
    echo '<form class="protected home col-mb-12" action="?' . $name . 'bf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form><br>';
    if (!$_POST) {
        echo ' 
  </p>
   </div>
   <div class="tab-pane fade" id="jmeter">
      <p>jMeter is an Open Source testing software. It is 100% pure 
      Java application for load and performance testing.</p>
   </div>
   <div class="tab-pane fade" id="ejb">
      <p>';
    }
    echo '
 
 <div class="mix_ht_about">
 <div class="mix_ht_about_img"><a href="https://jq.qq.com/?_wv=1027&k=nIdoRbMY" target="_blank"><img src="https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/rec_Wibus.jpg" width="80%" "/></a>
 <div class="mix_ht_about_mian">
 <p style="font-size:15px;margin-top: 6px !important;"><b> 双重空间混合体</b></p> 
 <p>Mix主题交流群：<a href="https://jq.qq.com/?_wv=1027&k=nIdoRbMY" target="_blank">点击加入</a></p>
 <p>本主题由<a href="https://iucky.cn"target="_blank">Wibus</a>内测发布，禁止倒卖<svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-chicken"></use></svg></p>
 </div>
 </div>
 </div>
 ';
    if (!$_POST) {
        echo '      </p>
   </div>
</div>';
    }
    print <<<EOT
<style>
.mix_ht_about{
    margin:0px;
}
.mix_ht_about a{ 
    color: #060606;
}
.mix_ht_about_img{
    float:initial;
}
.mix_ht_about img {
    float: initial;
    width: 50%;
    border-radius: 5px;
    box-shadow: 0 8px 10px -4px rgba(66, 172, 98, 0.34);
}
.mix_ht_about_mian{
    width: 50%;
    float: right;
    padding:0px 0px 0px  20px ;
}
.mix_ht_about_mian  h2 {
    color:#000;
    margin:0px;
}
.btn { 
    color:#000;
    padding: 0px 10px;
    border-radius: 4px;
    background-color: whitesmoke;
    box-shadow: 0 6px 7px -5px rgba(210, 210, 210, 0.6);
}
p{
    margin:15px 0px 10px 0px!important;
}
.mix_aliico{
    width: 20px;
    float: initial;
    height: 20px;
    margin-bottom: -4px;
}
</style> 
<link rel="stylesheet" href="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.css">  
<script src="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.js"></script> 
<script>
   $(function(){
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      // Get the name of active tab
      var activeTab = $(e.target).text(); 
      // Get the name of previous tab
      var previousTab = $(e.relatedTarget).text(); 
      $(".active-tab span").html(activeTab);
      $(".previous-tab span").html(previousTab);
   });
});
</script>
EOT;
    echo '<hr>
<svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-sound"></use></svg>
<span>  '.$message.'</span>';
?>   
<hr>
<?php


    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 基本设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的基本功能 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));
    //显示选项
    $Show_what = new Typecho_Widget_Helper_Form_Element_Checkbox('Show_what', 
    array(
    'ShowHeadSVG' => _t('顶部头像部件'),
    // 'ShowArticle' => _t('文章'),
    // 'ShowDairy' => _t('日记'),
    'ShowMore' => _t('了解更多'),
    'ShowIMouse' => _t('IMouse鼠标🖱️'),
    'jQueryPjax' => _t('jQuery版 Pjax'),
    'MoOxPjax' => _t('MoOx版 Pjax（强烈推荐！）')
    ),
    array('ShowHeadSVG','ShowIMouse', 'MoOxPjax'),_t('启动部件'),_t('一些部件启动选项'));  
        $form->addInput($Show_what->multiMode());

    //顶部名字
    $HeaderName = new Typecho_Widget_Helper_Form_Element_Text('HeaderName', NULL, _t('Wibus'), _t('顶部名字'), _t('这里填写的是文字'));
    $form->addInput($HeaderName);     
    //顶部描述
    $HeaderMore= new Typecho_Widget_Helper_Form_Element_Text('HeaderMore', NULL, _t('Just Uaeua'), _t('顶部描述'), _t('这里填写的是文字'));
    $form->addInput($HeaderMore);   
    //顶部最大头像
    $HeaderPhoto = new Typecho_Widget_Helper_Form_Element_Text('HeaderPhoto', NULL, _t('https://q.qlogo.cn/g?b=qq&nk=1596355173&s=640'), _t('顶部最大头像'), _t('这里填写的是照片URL'));
    $form->addInput($HeaderPhoto);
    //GitHub图标设置
    $HeaderGitHub = new Typecho_Widget_Helper_Form_Element_Text('HeaderGitHub', NULL, _t('wibus-wee'), _t('GitHub图标设置'), _t('这里填写的是URL'));
    $form->addInput($HeaderGitHub);
    //QQ图标设置
    $HeaderQQ = new Typecho_Widget_Helper_Form_Element_Text('HeaderQQ', NULL, _t('#'), _t('QQ图标设置'), _t('这里填写的是URL'));
    $form->addInput($HeaderQQ);
    //Twitter图标设置
    $HeaderTwitter = new Typecho_Widget_Helper_Form_Element_Text('HeaderTwitter', NULL, _t('#'), _t('Twitter图标设置'), _t('这里填写的是URL'));
    $form->addInput($HeaderTwitter);

    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 进阶设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的进阶功能 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    //More第一个设置
    $MoreJSON = new Typecho_Widget_Helper_Form_Element_Textarea('MoreJSON', NULL, _t(''), _t('了解更多模块设置'), _t('此处填写Json，请看使用文档再进行填写'));
    $form->addInput($MoreJSON);
    
    
    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 开发者设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的开发者功能，如JavaScript, CSS等 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    //自定义CSS
    $CSS = new Typecho_Widget_Helper_Form_Element_Textarea('CSS', NULL, _t(''), _t('自定义 CSS'), _t('这里填写的是css代码，来进行自定义样式，会自动输出到<\/head>标签之前'));
    $form->addInput($CSS);
    //自定义JavaScript
    $JavaScript = new Typecho_Widget_Helper_Form_Element_Textarea('JavaScript', NULL, _t(''), _t('自定义 JavaScript'), _t('这里填写的是JavaScript代码，会自动输出到<\/body>标签之前'));
    $form->addInput($JavaScript);
    //Pjax重载
    $PjaxReLoad = new Typecho_Widget_Helper_Form_Element_Textarea('PjaxReLoad', NULL, _t(''), _t('Pjax重载函数'), _t('这里面填写的是代码，用于重载Pjax函数'));
    $form->addInput($PjaxReLoad);
    //头部自定义输出HTML代码
    $HeaderHTML = new Typecho_Widget_Helper_Form_Element_Textarea('HeaderHTML', NULL, _t(''), _t('自定义输出head 头部的HTML代码'), _t('这里填写的是html代码，会输入到<\/head>之前</br>你可以填写网站统计代码等其他信息。</br>网站统计代码推荐google 统计和百度统计，不推荐cnzz（会导致样式错误，如果你会修改样式的话，请忽略该行）'));
    $form->addInput($HeaderHTML);
    //底部自定义输出HTML代码
    $FooterHTML = new Typecho_Widget_Helper_Form_Element_Textarea('FooterHTML', NULL, _t(''), _t('自定义输出body 尾部的HTML代码'), _t('这里填写的是html代码，这里填写的是html代码，会输入到<\/body>之前'));
    $form->addInput($FooterHTML);
    //博客底部左侧信息
    $LeftHTML = new Typecho_Widget_Helper_Form_Element_Textarea('LeftHTML', NULL, _t(''), _t('博客底部左侧信息'), _t('这里面填写的是 html代码，位置是博客底部的右边。'));
    $form->addInput($LeftHTML);
    //博客底部右侧信息
    $RightHTML = new Typecho_Widget_Helper_Form_Element_Textarea('RightHTML', NULL, _t(''), _t('博客底部右侧信息'), _t('这里面填写的是 html代码，位置是博客底部的右边。'));
    $form->addInput($RightHTML);


        
    
    
    $form->addItem(new Typecho_Widget_Helper_Layout("h3> IMouse设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 主题的鼠标样式设置 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    $IMouseDefaultBackgroundColor = new Typecho_Widget_Helper_Form_Element_Text('IMouseDefaultBackgroundColor', NULL, _t('\'rgba(1, 80, 111, .1)\''), _t('非 hover 默认状态下的光标背景颜色，CSS 格式'), _t('默认值：\'rgba(1, 80, 111, .1)\''));
    $form->addInput($IMouseDefaultBackgroundColor);
    $IMouseActiveBackgroundColor = new Typecho_Widget_Helper_Form_Element_Text('IMouseActiveBackgroundColor', NULL, _t('\'rgba(1, 80, 111, .15)\''), _t('非 hover 按下状态下的光标背景颜色，CSS 格式'), _t('默认值：\'rgba(1, 80, 111, .15)\''));
    $form->addInput($IMouseActiveBackgroundColor);
    $IMouseDefaultSize = new Typecho_Widget_Helper_Form_Element_Text('IMouseDefaultSize', NULL, _t('20'), _t('非 hover 默认状态下的光标直径'), _t('默认值：20'));
    $form->addInput($IMouseDefaultSize);
    $IMouseActiveSize = new Typecho_Widget_Helper_Form_Element_Text('IMouseActiveSize', NULL, _t('15'), _t('非 hover 按下状态下的光标直径'), _t('默认值：15'));
    $form->addInput($IMouseActiveSize);
    $IMouseHoverPadding = new Typecho_Widget_Helper_Form_Element_Text('IMouseHoverPadding', NULL, _t('8'), _t('hover 状态下的光标 padding 大小'), _t('默认值：8'));
    $form->addInput($IMouseHoverPadding);
    $IMouseActivePadding = new Typecho_Widget_Helper_Form_Element_Text('IMouseActivePadding', NULL, _t('4'), _t('hover 按下状态下的光标 padding 大小'), _t('默认值：4'));
    $form->addInput($IMouseActivePadding);
    $IMouseHoverRadius = new Typecho_Widget_Helper_Form_Element_Text('IMouseHoverRadius', NULL, _t('8'), _t('hover 状态下的光标圆角半径'), _t('默认值：8'));
    $form->addInput($IMouseHoverRadius);
    $IMouseActiveRadius = new Typecho_Widget_Helper_Form_Element_Text('IMouseActiveRadius', NULL, _t('4'), _t('hover 按下状态下的光标圆角半径
    '), _t('默认值：4'));
    $form->addInput($IMouseActiveRadius);
    $IMouseSelectionWidth = new Typecho_Widget_Helper_Form_Element_Text('IMouseSelectionWidth', NULL, _t('3'), _t('文字选择状态下的光标宽度'), _t('默认值：3'));
    $form->addInput($IMouseSelectionWidth);
    $IMouseSelectionHeight = new Typecho_Widget_Helper_Form_Element_Text('IMouseSelectionHeight', NULL, _t('40'), _t('文字选择状态下的光标高度'), _t('默认值：40'));
    $form->addInput($IMouseSelectionHeight);
    $IMouseSelectionRadius = new Typecho_Widget_Helper_Form_Element_Text('IMouseSelectionRadius', NULL, _t('2'), _t('文字选择状态下的光标圆角半径'), _t('默认值：2'));
    $form->addInput($IMouseSelectionRadius);
    /*
    Example:
    $name = new Typecho_Widget_Helper_Form_Element_Text('name', NULL, _t(''), _t('Title'), _t('Description'));
    $form->addInput($name);
    */
    



}


/*
 * 编写文章设置
 * themeFields(Typecho_Widget_Helper_Layout $layout){}控制
 */
function themeFields(Typecho_Widget_Helper_Layout $layout){


    $PostChoice = new Typecho_Widget_Helper_Form_Element_Select('PostChoice', array(
        '0'=>'文章样式',
        '1'=> '日记样式'
    ),'0', _t('当前文章页面样式类型'), '<strong style="color:red;">该设置仅对该篇文章有效</strong></br>默认选项是「文章」样式</br> 选择「日记」当前文章页面样式将会改为日记样式</br>不建议文章使用日记样式，日记使用文章样式');
    $layout->addItem($PostChoice);

}
?>
