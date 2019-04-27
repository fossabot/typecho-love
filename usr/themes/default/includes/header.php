<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<header class="header mdui-card">
  <div class="header-siteinfo">
      <h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
	  <p><?php $this->options->description() ?></p>
  </div>
	<div class="mdui-divider"></div>
	<nav>
	  <div class="mdui-tab mdui-tab-centered header-nav">
        <a href="<?php $this->options->SiteUrl(); ?>" class="mdui-ripple">首页</a>
		<?php $this->widget('Widget_Contents_Page_List')
        ->parse('<a href="{permalink}" class="mdui-ripple">{title}</a>'); ?>
      </div>
	</nav>
</header>