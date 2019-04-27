<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

  <main class="mdui-container">
    <div class="row">
      <!-- 主体 -->
	  <div class="mdui-col-xl-8 mdui-col-lg-8 mdui-col-md-8" id="pjax-container">
	    <!-- 文章 -->
		<br />
        <article>
		  <div class="post-body mdui-card">
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
			  <div class="mdui-divider post-hr"></div>
			  <div class="post-content">
			    <?php Contents::parseContent($this->content()); ?>
			  </div>
			</div>
		  </div>
		</article>
		
		<br />
		
		<?php $this->need('includes/comments.php'); ?>
		
	  </div>
	
	  <!-- 侧边栏 -->
	  <div class="mdui-col-xl-4 mdui-col-lg-4 mdui-col-md-4">
	    <?php $this->need('includes/sidebar.php'); ?>
	  </div>
	</div>
  </main>

<?php $this->need('includes/footer.php'); ?>