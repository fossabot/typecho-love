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
		    <h1 style="text-align:center">卧槽404!</h1>
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