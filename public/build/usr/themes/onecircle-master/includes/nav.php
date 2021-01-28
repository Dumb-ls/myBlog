<?php
/**
 * author:gogobody
 * time：2020-10-11 19：39
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<aside id="aside" class="app-aside hidden-xs bg-light">
    <div class="aside-wrap" layout="column">
        <div class="navi-wrap scroll-y scroll-hide" flex>
            <div class="nav-menu">
            <nav class="nav flex-column">
                <a<?php if ($this->is('index')): ?> class="nav-link active"<?php else:?> class="nav-link"<?php endif; ?>
                        href="<?php $this->options->siteUrl(); ?>">
                    <div class="nav-item nav-icon">
                        <svg t="1605599903214" class="nav-icon icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3902" width="1em" height="1em"><path d="M957.9 391.5c-1.1-7.5-5.5-14.2-12-18.5L527.4 98.9c-4.6-3.1-10.1-4.7-15.7-4.7-5.7 0-11.1 1.6-15.7 4.7L77.4 373.1c-6.2 4.1-10.4 10.3-11.6 17.4-1.2 7 0.5 14 4.8 19.7 5.2 6.9 13.7 11.1 22.6 11.1 5.6 0 11.1-1.6 15.7-4.7l40.2-26.3v435.4c0 57.8 45.8 104.7 102.2 104.7h520.8c56.3 0 102.2-47 102.2-104.7V390.2l40.4 26.5c5.7 3.5 11.1 5.2 16.4 5.2 7.9 0 15.2-3.8 21.5-11.4 4.4-5.4 6.3-12.1 5.3-19zM616.3 884.4H407V631.7c0-54 46.9-97.9 104.6-97.9 57.7 0 104.6 43.9 104.6 97.9v252.7z m202.4-58.8c0 28.6-20.9 51.9-46.6 51.9H665V631.7c0-79.4-68.8-143.9-153.3-143.9-84.5 0-153.3 64.6-153.3 143.9v245.9H251.3c-25.7 0-46.7-23.3-46.7-51.9V353.9l307.1-201.2 307.1 201.2v471.7z" fill="#6B400D" p-id="3903"></path><path d="M511.7 533.8c-57.7 0-104.6 43.9-104.6 97.9v252.7h209.3V631.7c-0.1-54-47-97.9-104.7-97.9z" fill="#FFD524" p-id="3904"></path><path d="M270.3 504.3c-17.5 0-31.7 14.7-31.7 32.8 0 18.1 14.2 32.8 31.7 32.8s31.7-14.7 31.7-32.8c-0.1-18.1-14.3-32.8-31.7-32.8zM270.3 592.9h-1.4c-13.1 0-23.8 10.7-23.8 23.8v212.5c0 13.1 10.7 23.8 23.8 23.8h1.4c13.1 0 23.8-10.7 23.8-23.8V616.7c0-13.1-10.7-23.8-23.8-23.8z" fill="#6B400D" p-id="3905"></path></svg>
                        <span class="nav-item-text"><?php _e('动态'); ?></span>
                    </div>
                </a>
                <a<?php if ($this->is('index')): ?> class="nav-link active"<?php else:?> class="nav-link"<?php endif; ?>
                        href="<?php $this->options->siteUrl(); ?>?recommend=default">
                    <div class="nav-item nav-icon">
                        <svg t="1605600499130" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8799" width="200" height="200"><path d="M287 962h530.35714248c45 0 80.35714248-35.35714248 80.35714336-80.35714248V576.28571416H158.42857168v257.14285752c0 70.71428584 57.85714248 128.57142832 128.57142832 128.57142832z" fill="#BAE7FF" p-id="8800"></path><path d="M647 962H238.78571416C193.78571416 962 158.42857168 926.64285752 158.42857168 881.64285752v-739.28571504C158.42857168 97.35714248 193.78571416 62 238.78571416 62h575.35714336C862.35714248 62 897.71428584 97.35714248 897.71428584 142.35714248v572.14285752L647 962z" fill="#69C0FF" p-id="8801"></path><path d="M650.21428584 962v-186.42857168c0-32.14285752 25.71428584-61.07142832 61.07142832-61.07142832H897.71428584L650.21428584 962z" fill="#1890FF" p-id="8802"></path><path d="M319.14285752 640.57142832h417.85714248c19.28571416 0 32.14285752-12.85714248 32.14285752-32.14285664s-12.85714248-32.14285752-32.14285752-32.14285752H319.14285752c-19.28571416 0-32.14285752 12.85714248-32.14285752 32.14285752s12.85714248 32.14285752 32.14285752 32.14285664zM576.28571416 479.85714248h160.71428584c19.28571416 0 32.14285752-12.85714248 32.14285752-32.14285664s-12.85714248-32.14285752-32.14285752-32.14285752h-160.71428584c-19.28571416 0-32.14285752 12.85714248-32.14285664 32.14285752s12.85714248 32.14285752 32.14285664 32.14285664z" fill="#BAE7FF" p-id="8803"></path><path d="M319.14285752 479.85714248h128.57142832c19.28571416 0 32.14285752-12.85714248 32.14285664-32.14285664V287c0-19.28571416-12.85714248-32.14285752-32.14285664-32.14285752H319.14285752c-19.28571416 0-32.14285752 12.85714248-32.14285752 32.14285752v160.71428584c0 19.28571416 12.85714248 32.14285752 32.14285752 32.14285664z" fill="#BAE7FF" p-id="8804"></path><path d="M576.28571416 319.14285752h160.71428584c19.28571416 0 32.14285752-12.85714248 32.14285752-32.14285752s-12.85714248-32.14285752-32.14285752-32.14285752h-160.71428584c-19.28571416 0-32.14285752 12.85714248-32.14285664 32.14285752s12.85714248 32.14285752 32.14285664 32.14285752z" fill="#BAE7FF" p-id="8805"></path></svg>
                        <span class="nav-item-text"><?php _e('发现'); ?></span>
                    </div>
                </a>
                <a class="nav-link" href="<?php _e($this->options->index); ?>/myblog">
                    <div class="nav-item nav-icon">
                        <svg t="1606702800546" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2980" width="200" height="200"><path d="M512 1024C229.2224 1024 0 794.7776 0 512S229.2224 0 512 0s512 229.2224 512 512-229.2224 512-512 512z m-229.12-443.6224c18.176-15.6416 27.264-36.1472 27.264-61.44 0-20.352-6.016-36.864-17.9456-49.6128-11.9808-12.7232-27.9296-20.224-47.872-22.5792v-0.8192c15.9744-5.2224 28.4672-14.0032 37.5552-26.3936 9.0624-12.3648 13.5936-26.9312 13.5936-43.7248 0-20.0704-7.4752-36.352-22.4768-48.896-15.0016-12.544-35.2512-18.7648-60.8256-18.7648H128.0256V603.904h86.1952c27.648 0 50.5344-7.8336 68.6848-23.5264z m-120.2176-240.896H202.496c37.8112 0 56.704 14.3872 56.704 43.1104 0 16.64-5.4272 29.5168-16.2816 38.656-10.8544 9.1648-25.7792 13.7216-44.7488 13.7216H162.6624v-95.488z m0 126.6432H202.496c47.5648 0 71.3472 17.4848 71.3472 52.3776 0 16.7936-5.6064 29.9776-16.7936 39.6032-11.2384 9.6256-26.9824 14.4384-47.36 14.4384H162.688v-106.4192z m202.9568-158.592V603.904h33.792V307.5328h-33.792z m267.1872 266.368c19.0208-20.2752 28.5696-47.2576 28.5696-80.9216 0-34.4064-8.8576-61.2864-26.496-80.64-17.6896-19.4048-42.24-29.0816-73.728-29.0816-33.024 0-59.2128 9.984-78.592 29.9008-19.3792 19.968-29.0816 47.6416-29.0816 83.1232 0 32.5632 9.3184 58.752 27.9552 78.464 18.6112 19.712 43.5456 29.5936 74.752 29.5936 32.0256 0 57.5744-10.1632 76.6208-30.4384z m-144.6912-78.8992c0-25.984 6.3232-46.3616 18.9696-61.1328 12.6464-14.7968 29.824-22.1952 51.5584-22.1952 21.8624 0 38.6816 7.168 50.432 21.4528 11.776 14.3104 17.6384 34.6624 17.6384 61.056 0 26.112-5.888 46.2592-17.664 60.416-11.7248 14.1568-28.544 21.248-50.4064 21.248-21.4528 0-38.5792-7.1936-51.3536-21.632-12.8-14.464-19.1744-34.176-19.1744-59.2128z m407.5264 87.4496v-194.2528h-33.8176v29.2608h-0.8192c-13.7728-22.8096-34.8672-34.2272-63.3344-34.2272-29.952 0-53.5808 10.5984-70.8352 31.744-17.2544 21.1968-25.856 49.7152-25.856 85.6064 0 31.616 7.9872 56.832 24.0128 75.5968 16.0256 18.7648 37.1712 28.16 63.4112 28.16 32.3328 0 56.5248-13.4912 72.6272-40.448h0.8192v23.1168c0 21.6576-3.9936 39.0656-12.0064 52.224l-17.0752 18.0736-0.7424 0.512c-5.3504 3.3024-43.1872 24.4992-97.3824-0.4096-58.5728-26.9568-141.8752-29.184-162.4064 41.3952l24.1664 18.5856s0-33.2032 37.4272-46.4896c27.8016-9.856 58.0608 2.6112 81.9968 12.8768v0.128c6.912 3.5072 14.1824 6.3744 21.8624 8.6272l0.384 0.1024a168.448 168.448 0 0 0 46.2336 6.144c74.2144 0 111.3344-38.784 111.3344-116.3264z m-51.6608-26.8032c-11.904 13.4656-27.3408 20.224-46.3104 20.224-18.688 0-33.7152-7.0656-45.056-21.1712-11.3408-14.08-17.024-32.8704-17.024-56.3968 0-27.3664 5.888-48.64 17.7408-63.8208 11.8272-15.1808 28.16-22.784 49.0752-22.784 16.9216 0 31.0272 5.9648 42.3936 17.92a60.416 60.416 0 0 1 17.024 43.1104v31.1552c0 21.0176-5.9648 38.272-17.8432 51.7632z" fill="#62AFFE" p-id="2981"></path></svg>
                        <span class="nav-item-text"><?php _e('博客'); ?></span>
                    </div>
                </a>
                <?php $pages = null;
                $this->widget('Widget_Contents_Page_List')->to($pages); ?>

                <?php utils::customNavHandle($this->options->customNavIcon, $pages, $this);?>
            </nav>
        </div>
        </div>
        <?php echo Typecho_Plugin::factory('OneCircle.Donate')->Donate(); ?>

    </div><!--.aside-wrap-->

</aside>


