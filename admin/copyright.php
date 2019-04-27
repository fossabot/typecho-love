<?php if(!defined('__TYPECHO_ADMIN__')) exit; ?>
<div class="typecho-foot" role="contentinfo">
    <div class="copyright">
        <a href="https://typecho.love" class="i-logo-s">Typecho</a>
        <p><?php _e('由 <a href="https://typecho.love">%s</a> 强力驱动, 版本 %s (%s)', $options->software, $prefixVersion, $suffixVersion); ?></p>
    </div>
    <nav class="resource">
        <a href="https://typecho.love"><?php _e('关于我们'); ?></a> &bull;
        <a href="https://github.com/typecho-lover/typecho-love/wiki"><?php _e('帮助文档'); ?></a> &bull;
        <a href="https://github.com/typecho-lover/typecho-love/issues"><?php _e('报告错误'); ?></a> &bull;
        <a href="https://github.com/typecho-lover/typecho-love/projects"><?php _e('开发路线'); ?></a>
    </nav>
</div>
