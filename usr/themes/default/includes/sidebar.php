<br />
<aside class="mdui-card sidebar-item">
  <?php if($this->options->SidebarImage && $this->options->SidebarImage!=''): ?>
  <div class="mdui-card-media sidebar-image">
    <img src="<?php $this->options->SidebarImage(); ?>"/>
  </div>
  <?php endif; ?>
  <div class="mdui-card-actions">
    <p><span class="post-footer"><?php $this->author->gravatar(40) ?><span class="post-author"><?php $this->author() ?></span></span>

	  <span class="mdui-float-right sidebar-counter">
	    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
	    <button class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: '文章 <?php $stat->publishedPostsNum() ?>'}"><i class="fa fa-book"></i></button>
		<button class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: '评论 <?php $stat->publishedCommentsNum() ?>'}"><i class="fa fa-comment"></i></button>
	  </span>
	</p>
  </div>
</aside>

<br />

<aside class="mdui-card sidebar-item">
  <h4 class="sidebar-title">最新访客</h4>
  <ul class="mdui-list sidebar-list">
    <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
    <?php while($comments->next()): ?>
	<a href="<?php $comments->permalink(); ?>">
    <li class="mdui-list-item mdui-ripple">
      <div class="mdui-list-item-avatar"><?php $comments->gravatar(200); ?></div>
      <div class="mdui-list-item-content"><?php $comments->excerpt(100, '...'); ?></div>
    </li>
	</a>
	<?php endwhile; ?>
  </ul>
</aside>

<br />

<aside class="mdui-card sidebar-item">
  <h4 class="sidebar-title">快捷分类</h4>
  <ul class="mdui-list sidebar-list">
    <?php $this->widget('Widget_Metas_Category_List')
    ->parse('<a href="{permalink}"><li class="mdui-list-item mdui-ripple">{name}</li></a>'); ?>
  </ul>
</aside>

