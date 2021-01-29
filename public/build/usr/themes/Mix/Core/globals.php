<?php $this->widget('Widget_Contents_Page_List')->to($pages);
while ($pages->next()):
    switch ($pages->template): case 'page-note.php':
            $GLOBALS['note'] = $pages->permalink;
            break;
        case 'page-more.php':
            $GLOBALS['more'] = $pages->permalink;
            break;
        case 'page-links.php':
            $GLOBALS['links'] = $pages->permalink;
            break;
        case 'page-say.php':
            $GLOBALS['say'] = $pages->permalink;
            $GLOBALS['say_text'] = $pages->content;
    endswitch;
endwhile;?>