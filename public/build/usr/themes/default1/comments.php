<?php function threadedComments($comments, $options) {
    $cl = $comments->levels > 0 ? 'c_c' : 'c_p';
    $author = $comments->url ? '<a href="' . $comments->url . '"'.'" target="_blank"' . ' rel="external">' . $comments->author . '</a>' : $comments->author;
?>
<li id="li-<?php $comments->theId();?>" class="<?php echo $cl;?>">
<div id="<?php $comments->theId(); ?>">
    <div class="cp">
    <?php $comments->content(); ?>
    <div class="cm"><span class="ca"><?php echo $author ?></span> <?php $comments->date(); ?><span class="cr"><?php $comments->reply(); ?></span></div>
    </div>
</div>
<?php if ($comments->children){ ?><div class="children"><?php $comments->threadedComments($options); ?></div><?php } ?>
</li>
<?php } ?>
<style type="text/css">
.cf {margin:10px 0 }
.cf .page-navigator {margin:3.75rem 0 3rem 0}
.response {margin:2rem 0}
.hinfo {display:none}
.comment-list {padding-left:0;list-style-type:none;margin:0}
.cp {overflow:hidden;padding:1rem 0;border-bottom:1px dotted #bbb}
.cp p {margin:0}
.cr {float:right;display:none}
.cp:hover .cr {display:block}
.ccr,.cm {margin-top:1rem;}
.ccr {text-align:right}
.ca {padding:.1rem .25rem;border-radius:2px;}
.c_p>.children {margin-left:1rem;padding-left:40px}
.tbox {padding:0 0 0 18px}
.ci {font-size:14px;line-height:1.5;color:#ccc;height:30px;margin:10px 0;border:1px solid #ccc;border-radius:2px;width:100%;padding:3px 7px;margin-left:-18px;overflow:auto;font-family:-apple-system,SF UI Text,Arial,PingFang SC,Hiragino Sans GB,Microsoft YaHei,WenQuanYi Micro Hei,sans-serif;}
.ci:focus {border-color:#ccc;outline:0}
textarea.ci {padding-top:8px;height:10rem;resize:none}
.submit {border:1px solid #fff;padding:0 30px;line-height:36px;text-align:center;height:36px;margin:0 auto;display:block;background:#fff;font-family:-apple-system,SF UI Text,Arial,PingFang SC,Hiragino Sans GB,Microsoft YaHei,WenQuanYi Micro Hei,sans-serif;font-size:14px;color:#3354AA;}
.submit:hover {border-color:#fff;background:#fff;cursor:pointer;color:#282828;}
@media only screen and (max-width:767px) {.c_p .children {margin-left:0;padding-left:0}
}
</style>
<div id="comments" class="cf">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
    <h4><span class="icon-edit"></span>  <?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?></h4>
    <?php $comments->listComments(); ?><?php $comments->pageNav('&laquo;', '&raquo;'); ?>
<?php endif; ?>
<div id="<?php $this->respondId(); ?>" class="respond">
    <div class="ccr"><?php $comments->cancelReply(); ?></div>
    <h4 class="response"><span class="icon-edit-3"></span> 发表新评论</h4>
<form method="post" action="<?php $this->commentUrl() ?>" id="cf" role="form">
<?php if($this->user->hasLogin()): ?>
    <span>已登入<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出 &raquo;</a></span>
<?php else: ?>
    <?php if($this->remember('author',true) != "" && $this->remember('mail',true) != "") : ?>
        <span>欢迎【<?php $this->remember('author'); ?>】的归来 | <small style="cursor: pointer;" onclick = "tg_c('ainfo','hinfo');"> 编辑资料</small></span>
        <div id ="ainfo" class="ainfo hinfo">
    <?php else : ?>
        <div class="ainfo">
        <?php endif ; ?>
        <div class="tbox">
        <input type="text" name="author" id="author" class="ci" placeholder="称呼" value="<?php $this->remember('author'); ?>" required>
        <input type="email" name="mail" id="mail" class="ci" placeholder="邮箱" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>>
        <input type="url" name="url" id="url" class="ci" placeholder="http://" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>>
        </div>
        </div>
    <?php endif; ?>
    <div class="tbox"><textarea name="text" id="textarea" class="ci" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="在这里输入你的评论" required ><?php $this->remember('text',false); ?></textarea></div>
    <button type="submit" class="submit" id="submit">提交评论 (Ctrl + Enter)</button>
</form>
</div>
</div>