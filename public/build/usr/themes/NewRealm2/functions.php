<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {

    //网站LOGO
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
    
    //备案号
    $SiteICP = new Typecho_Widget_Helper_Form_Element_Text('SiteICP', NULL, NULL, _t('网站备案号'), _t('如果你的网站已经备案，请在此处填写你的网站备案号'));
    $form->addInput($SiteICP);
    
    //边栏设置
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
    
    //公告
    $ac = new Typecho_Widget_Helper_Form_Element_Textarea('ac', NULL, NULL, _t('站点公告'), _t('每条一行，支持HTML代码。（建议不要再这里插入一些影响布局的代码）'));
    $form->addInput($ac);
    
    //广告
    $SiteAD = new Typecho_Widget_Helper_Form_Element_Textarea('SiteAD', NULL, NULL, _t('广告设置'), _t('广告位大小：200x200，请在此处填写广告联盟或您个人的广告代码，支持HTML \ JS \ CSS'));
    $form->addInput($SiteAD);
    
}
 
function getFriendWall(){
   $period = time() - 99999999999999999999999; // 单位: 秒, 时间范围: 2592000为30天
   $db = Typecho_Db::get();
   $sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')
   ->from('table.comments')
   ->where('created > ?', $period )
   ->where('status = ?', 'approved')
   ->where('type = ?', 'comment')          
   ->where('authorId = ?', '0')
   ->where('mail != ?', '')   //排除自己上墙
   ->group('author')
   ->order('cnt', Typecho_Db::SORT_DESC)
   ->limit('60');    //读取几位用户的信息
   $result = $db->fetchAll($sql);
$mostactive = "";
$my_array=array('www','0','1','2'); //我自定义的随机一个头像服务器,减少同时往一个服务器发起多次请求
   if (count($result) > 0) {
       foreach ($result as $value) {
           $mostactive .= '<li><a href="' . $value['url'] . '" title="' . $value['author'] . ':' . $value['cnt'] . '℃" target="_blank" rel="nofollow">';
           $mostactive .= '<img class="avatar" src="http://'.$my_array[rand(0,3)].'.gravatar.com/avatar/'.md5(strtolower($value['mail'])).'?s=40&d=&r=G"/></a></li>';
       }
       echo $mostactive;
   }
}
/*/获取文章第一张图，md编辑器无效：<div class="thumnails"><?php thumnail($this,220,140);?></div>
function thumnail($obj,$width,$height){
$content = $obj->text;
preg_match_all( "/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $content, $matches );
$imgCount = count($matches[0]);
//使用timthumb.php裁剪，无法与七牛API裁剪共存，请自行选择注释！
//if( $imgCount >=1 ){
//echo '<img src="'. Helper::options()->themeUrl . '/timthumb.php?w='.$width.'&h='.$height.'&src='.$matches[2][0].'" alt="'. $obj->title .'">';
//}else{
//echo '<img src="'. Helper::options()->themeUrl . '/timthumb.php?w='.$width.'&h='.$height.'&src='.Helper::options()->themeUrl . '/images/screenshot.jpg" //alt="'. $obj->title .'">';
//}
//----七牛API裁剪开始
if( $imgCount >=1 ){
echo '<img src="'.$matches[2][0].'?imageView/1/w/'.$width.'/h/'.$height.'" alt="'. $obj->title .'">';
}else{
echo '<img src="'.Helper::options()->themeUrl . '/images/screenshot.jpg" alt="'. $obj->title .'">';
}
//----七牛API裁剪结束
}*/
/*/获取文章第一张图，MD编辑器无效:<?php echo img_postthumb($this->cid); ?>
function img_postthumb($cid) {
   $db = Typecho_Db::get();
   $rs = $db->fetchRow($db->select('table.contents.text')
       ->from('table.contents')
       ->where('table.contents.cid=?', $cid)
       ->order('table.contents.cid', Typecho_Db::SORT_ASC)
       ->limit(1));
   preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
   $img_src = $thumbUrl[1][0];  //将赋值给img_src
   $img_counter = count($thumbUrl[0]);  //一个src地址的计数器
   switch ($img_counter > 0) {
       case $allPics = 1:
           echo $img_src;  //当找到一个src地址的时候，输出缩略图
           break;
       default:
           echo "sdsadsadas";  //没找到(默认情况下)，不输出任何内容
   };
}
*/
/** 
//判断移动端或电脑端
function isMobile(){
    $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';
    function CheckSubstrs($substrs,$text){
        foreach($substrs as $substr)
            if(false!==strpos($text,$substr)){
            return true;
        }
        return false;
    }
    $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
    $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');
 
    $found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||
    CheckSubstrs($mobile_token_list,$useragent);
 
    if ($found_mobile){
        return true;
    }else{
        return false;
    }
}
//前端引用代码事例
<?php if ($this->options->isMobile): ?>
手机
<?php else: ?>
电脑
<?php endif; ?>
**/