<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="footer-info">
  <p>Powerd by <a href="https://github.com/typecho-lover/typecho-love/">Typecho-love</a> | Theme default by <A href="https://github.com/typecho-lover/">Typecho-Lover-Dev</a></p>
  <div class="footer-hr"></div>
  <p id="hitokoto"></p>
</div>

<a href="#top" class="mdui-fab mdui-ripple" id="back-to-top"><i class="fa fa-chevron-up"></i></a>

<footer>
  <script src="<?php Utils::indexTheme('assets/js/main.js'); ?>"></script>
  <script src="<?php Utils::indexTheme('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php Utils::indexTheme('assets/js/mdui.min.js'); ?>"></script>
  <!-- cdnjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <!-- hitokoto -->
  <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
  <script>
  document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
  });
});
//gotop
$("#back-to-top").click(function(){
    $("html,body").animate({scrollTop: $($(this).attr("link")).offset().top-50}, 400);
});
  </script>
  <?php $this->footer(); ?>
</footer>

<body>
</html>