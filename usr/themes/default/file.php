<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 归档
 *
 * @package custom
 */
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
			  </div>
			  <div class="mdui-divider post-hr"></div>
			  <div class="post-content">
			    <ul class="mdui-list">
                <?php
                $stat = Typecho_Widget::widget('Widget_Stat');
                $this->widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
                $year=0; $mon=0; $i=0; $j=0;
                while($archives->next()){
                  $year_tmp = date('Y',$archives->created);
                  $mon_tmp = date('m',$archives->created);
                  $y=$year; $m=$mon;
                  if ($year > $year_tmp || $mon > $mon_tmp) {
                    $output .= '</ul>';
                  }
                  $output .= '<a href="'.$archives->permalink .'" data-pjax><li class="mdui-list-item mdui-ripple"><span style="color:gray">'. $year_tmp .' - '. $mon_tmp .'&nbsp;|&nbsp;</span>'. $archives->title .'<br /></li></a>';
                }
                $output .= '</ul>';
                echo $output;
                ?>
                </ul>
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
