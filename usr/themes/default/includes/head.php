<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="renderer" content="webkit">
  <meta name="HandheldFriendly" content="true">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php 
    $banner = '';
    $description = '';
    if($this->is('post') || $this->is('page')){
        if(isset($this->fields->banner))
            $banner=$this->fields->banner;
        if(isset($this->fields->excerpt))
            $description = $this->fields->excerpt;
    }else{
        $description = Helper::options()->description;
    }
  ?>
  <title><?php Contents::title($this); ?></title>
  
  <meta name="author" content="<?php $this->author(); ?>" />
  <meta name="description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
  <meta property="og:title" content="<?php Contents::title($this); ?>" />
  <meta property="og:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
  <meta property="og:site_name" content="<?php Helper::options()->title(); ?>" />
  <meta property="og:type" content="<?php if($this->is('post') || $this->is('page')) echo 'article'; else echo 'website'; ?>" />
  <meta property="og:url" content="<?php $this->permalink(); ?>" />
  <meta property="og:image" content="<?php echo $banner; ?>" />
  <meta property="article:published_time" content="<?php echo date('c', $this->created); ?>" />
  <meta property="article:modified_time" content="<?php echo date('c', $this->modified); ?>" />
  <meta name="twitter:title" content="<?php Contents::title($this); ?>" />
  <meta name="twitter:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content<?php echo $banner; ?>" />
  <?php $this->header('description=&'); ?>
  
  <link rel="stylesheet" href="<?php Utils::indexTheme('assets/css/mdui.min.css'); ?>" />
  <link rel="stylesheet" href="<?php Utils::indexTheme('assets/css/normalize.css'); ?>" />
  <link rel="stylesheet" href="<?php Utils::indexTheme('assets/css/main.css'); ?>" />
  
  <!-- 引入思源宋体 -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC" rel="stylesheet">
  <!-- fontawesome -->
  <link href="https://cdn.bootcss.com/font-awesome/5.8.1/css/all.css" rel="stylesheet">
  <!-- hightlight -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/atom-one-dark.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
 
  <?php if($this->options->IndexImage && $this->options->IndexImage!=''): ?>
  <!-- 首页大图设置 -->
  <style>
    .header-siteinfo{
		color:#fff;
		background:url('<?php $this->options->IndexImage() ?>') no-repeat;
		background-size:cover;
	}
	.header-siteinfo a{
		color:#fff;
	}
  </style>
  <?php endif; ?>
</head>

<body>
<div id="top"></div>