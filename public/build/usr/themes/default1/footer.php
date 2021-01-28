<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" class="container" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.<?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.<span class="alignright"><a href="<?php $this->options->siteUrl(); ?>#top">TOP <span class="icon-chevrons-up"></span></a></span>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
