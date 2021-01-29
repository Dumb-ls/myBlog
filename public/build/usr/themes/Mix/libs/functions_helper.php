<?php
/**
 * functions_helper.php
 * 用于为functions新增一些新玩意
 * @author Wibus
 */

Helper::options()->commentsCheckReferer = false; //强制关闭来源页检测（Pjax）

/**
 * thumb 随机头图
 * 逻辑：有图片附件，就调用第1个图片附件，否则随机显示
 */
function thumb($cid, $site_Url) {
    if (empty($imgurl)) {
    $rand_num = 23; //随机图片数量，根据图片目录中图片实际数量设置
    if ($rand_num == 0) {
    $imgurl = "$site_Url/assets/img/0.png";
    //如果$rand_num = 0,则显示默认图片，须命名为"0.png"，注意是绝对地址
        }else{
    $imgurl = "$site_Url/assets/img/".rand(1,$rand_num).".png";
    //随机图片，须按"1.png","2.png","3.png"...的顺序命名，注意是绝对地址
    }
    }
     $db = Typecho_Db::get();
     $rs = $db->fetchRow($db->select('table.contents.text')
        ->from('table.contents')
        ->where('table.contents.type = ?', 'attachment')
        ->where('table.contents.parent= ?', $cid)
        ->order('table.contents.cid', Typecho_Db::SORT_ASC)
        ->limit(1));
    $img = unserialize($rs['text']);
    if (empty($img)){
        echo $imgurl;
    }
    else{
        $Url = intval($site_Url)+intval($img['path']);
        echo $Url;
    }
    }


/**
 * 实时人数显示
 */
//在线人数
function online_users() {
    $filename='online.txt'; //数据文件
    $cookiename='Nanlon_OnLineCount'; //Cookie名称
    $onlinetime=30; //在线有效时间
    $online=file($filename); 
    $nowtime=$_SERVER['REQUEST_TIME']; 
    $nowonline=array(); 
    foreach($online as $line){ 
        $row=explode('|',$line); 
        $sesstime=trim($row[1]); 
        if(($nowtime - $sesstime)<=$onlinetime){
            $nowonline[$row[0]]=$sesstime;
        } 
    } 
    if(isset($_COOKIE[$cookiename])){
        $uid=$_COOKIE[$cookiename]; 
    }else{
        $vid=0;
        do{
            $vid++; 
            $uid='U'.$vid; 
        }while(array_key_exists($uid,$nowonline)); 
        setcookie($cookiename,$uid); 
    } 
    $nowonline[$uid]=$nowtime;
    $total_online=count($nowonline); 
    if($fp=@fopen($filename,'w')){ 
        if(flock($fp,LOCK_EX)){ 
            rewind($fp); 
            foreach($nowonline as $fuid=>$ftime){ 
                $fline=$fuid.'|'.$ftime."\n"; 
                @fputs($fp,$fline); 
            } 
            flock($fp,LOCK_UN); 
            fclose($fp); 
        } 
    } 
    echo "$total_online"; 
} 

?>