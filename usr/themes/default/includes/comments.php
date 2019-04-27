<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
<section id="<?php $comments->theId(); ?>" class="comment-item <?php 
if ($comments->_levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}$comments->alt(' comment-odd', ' comment-even');
echo $commentClass; ?>">
  <div class="comment-parent mdui-card"><div class="mdui-card-actions mdui-container-fluid">
    
	  <div class="mdui-row">
	    <div class="mdui-col-md-1 mdui-col-sm-2 mdui-col-lg-1 comment-avatar">
		  <?php $comments->gravatar('50', ''); ?>
		  <div class="comment-reply">
	        <?php $comments->reply(); ?>
	      </div>
		</div>
		<div class="mdui-col-md-11 mdui-col-sm-10 mdui-col-lg-11">
		<div class="comment-author-info">
	    <h3 class="comment-author"><?php $comments->author(); ?></h3>
		<span class="comment-ua">
          <?php getOs($comments->agent); ?>
          <?php getBrowser($comments->agent); ?>
		</span>
		</div><br />
		<Div class="comment-date">
		  <?php $comments->date('Y-m-d H:i'); ?>
        </div>
	<div class="comment-content">
	  <?php if ('waiting' == $comments->status) { ?><span class="text-muted">您的评论需管理员审核后才能显示！</span><?php } ?>
	  <?php Contents::parseComment($comments->content()); ?>
	</div>
	</div>
	</div>
  </div>
  <br />
  <div class="comment-children">
    <?php if ($comments->children) { ?>
    <div class="comment-children">
    <?php $comments->threadedComments($options); ?>
    </div>
    <?php } ?>
  </div>
  </div>
</section>
<br />
<?php } ?>

<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<div class="mdui-card"><h3 style="margin:10px"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3></div>
<div class="comment-list">
  <?php $comments->listComments(); ?>
</div>
<div class="post-pagenav"><?php $comments->pageNav('<', '>'); ?></div>
<?php endif; ?>

<br />

<!-- 判断设置是否允许对当前文章进行评论 -->
<?php if($this->allow('comment')): ?>

    <div id="<?php $this->respondId(); ?>" class="respond">
	<div class="mdui-card comment-form">
      <div class="mdui-card-actions">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply('×'); ?>
        </div>

        <h2 id="response"><?php _e('加入吐槽ヾ(◍°∇°◍)ﾉﾞ'); ?></h2>
        <!-- 输入表单开始 -->
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
          <!-- 输入要回复的内容 -->
		    <div class="mdui-container-fluid"><div class="mdui-row">
            <p class="mdui-col-lg-12 mdui-col-md-12 mdui-col-xl-12">
                <label for="textarea" class="required"><?php _e('内容'); ?></label>
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
            <!-- 如果当前用户已经登录 -->
            <?php if($this->user->hasLogin()): ?>
            <!-- 显示当前登录用户的用户名以及登出连接 -->
            <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <!-- 若当前用户未登录 -->
            <?php else: ?>
            <!-- 要求输入名字、邮箱、网址 -->
              <p class="mdui-col-lg-4 mdui-col-md-4 mdui-col-xl-4">
                <label for="author" class="required"><?php _e('称呼'); ?></label>
                <input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
              </p>
              <p class="mdui-col-lg-4 mdui-col-md-4 mdui-col-xl-4">
                <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                <input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
              </p>
              <p class="mdui-col-lg-4 mdui-col-md-4 mdui-col-xl-4">
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
              </p>
            <?php endif; ?>
			<p class="mdui-col-lg-12 mdui-col-md-12 mdui-col-xl-12">
                <button type="submit" class="submit mdui-btn-block mdui-btn comment-submit"><?php _e('提交评论'); ?></button>
            </p>
			</div></div>
			</div>
          </div>
        </form>

<!-- 若当前文章不允许进行评论 -->
</div>
<?php else: ?>
    <div class="mdui-card"><div class="mdui-card-actions"><h3><?php _e('评论已关闭'); ?></h3></div></div>
<?php endif; ?>
