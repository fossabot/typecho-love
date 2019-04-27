<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

  <main class="mdui-container">
    <div class="row">
      <!-- 主体 -->
	  <div class="mdui-col-xl-8 mdui-col-lg-8 mdui-col-md-8" id="pjax-container">

		<br />
        <article>
		  <div class="post-body mdui-card">
			
            <div class="mdui-card-actions">
			  <div class="post-item-title">
			    <h2><?php if ($this->have()): ?>
	  	<?php $this->archiveTitle(array(
        'category'=>_t('分类 %s 下的文章'),
        'search'=>_t('包含关键字 %s 的文章'),
        'tag' =>_t('标签 %s 下的文章'),
        'author'=>_t('%s 的主页')
        ), '', ''); ?>
      <?php else: ?>
        居然没有找到相关内容Σ(⊙▽⊙"a
      <?php endif; ?></h2>
			  </div>
			  <div class="mdui-divider post-hr"></div>
			  <div class="post-content">
                <?php while($this->next()): ?>
				  <div class="archive-item">
				    <a href="<?php $this->permalink() ?>" class="post-link">
				      <h2><?php $this->title(); ?></h2>
			          <div class="post-item-excerpt">
			            <p><?php $this->excerpt(300) ?></p>
			          </div>
				    </a>
				  </div>
				<?php endwhile; ?>
			  </div>
			</div>
		  </div>
		</article>
		
		<br />
		
	  </div>
	
	  <!-- 侧边栏 -->
	  <div class="mdui-col-xl-4 mdui-col-lg-4 mdui-col-md-4">
	    <?php $this->need('includes/sidebar.php'); ?>
	  </div>
	</div>
  </main>


<?php $this->need('includes/footer.php'); ?>