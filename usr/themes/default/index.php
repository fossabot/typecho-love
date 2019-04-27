<?php
/**
 * Theme-default
 *
 * Typecho-love版本的默认模板
 * 
 * @package     Typecho-Theme-default
 * @author      Typecho-lover (BigCoke233)
 * @version     1.0
 * @link        https://github.com/typecho-lover/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

  <main class="mdui-container">
    <div class="row">
      <!-- 主体 -->
	  <div class="mdui-col-xl-8 mdui-col-lg-8 mdui-col-md-8" id="pjax-container">
	    <!-- 文章列表 -->
		<br />
		<article class="post-list">
	    <?php while($this->next()): ?>
		<a href="<?php $this->permalink() ?>" class="post-link">
		  <div class="post-item mdui-card mdui-hoverable">
		    <?php if($this->fields->banner && $this->fields->banner!=''): ?>
		    <div class="mdui-card-media post-banner">
              <img src="<?php $this->fields->banner(); ?>"/>
            </div>
			<?php endif; ?>
            <div class="mdui-card-actions">
               <div class="post-item-title">
			     <h2><?php $this->title(); ?></h2>
				 <span>分类&nbsp;<?php $this->category(',','','无分类'); ?>&nbsp;|&nbsp;评论&nbsp;<?php $this->commentsNum('%d Comments'); ?>&nbsp;|&nbsp;<?php $this->date('F j, Y'); ?></span>
			   </div>
			   <div class="post-item-excerpt">
			     <p><?php $this->excerpt(200) ?></p>
			   </div>
			   <div class="mdui-divider"></div>
			   <p class="post-footer">
			    <?php $this->author->gravatar(40) ?><span class="post-author"><?php $this->author() ?></span>
			    <a href="<?php $this->permalink() ?>" class="mdui-btn mdui-float-right post-readmore">继续阅读</a>
			   </p>
            </div>
		  </div>
		  <br />
		</a>
		<?php endwhile; ?>
		</article>
		<div class="post-pagenav"><?php $this->pageNav(); ?></div>
	  </div>
	
	  <!-- 侧边栏 -->
	  <div class="mdui-col-xl-4 mdui-col-lg-4 mdui-col-md-4">
	    <?php $this->need('includes/sidebar.php'); ?>
	  </div>
	</div>
  </main>

<?php $this->need('includes/footer.php'); ?>