<?php
/**
 * functions.php
 * 
 * 初始化
 * 
 * @author BigCoke233
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<?php

require_once("libs/Utils.php");
require_once("libs/Contents.php");

Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Contents','parseContent');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Contents','parseContent');

/**
 * 主题后台设置
 */
function themeConfig($form) {
	$BlogerName = new Typecho_Widget_Helper_Form_Element_Text('BlogerName', NULL, NULL, _t('博主名称'), _t('博主名称，显示在侧边栏'));
    $form->addInput($BlogerName);
	
	$SidebarImage = new Typecho_Widget_Helper_Form_Element_Text('SidebarImage', NULL, NULL, _t('侧边栏图片'), _t('填入一个图片url，显示在侧边栏，不填则不显示'));
    $form->addInput($SidebarImage);
	
	$IndexImage = new Typecho_Widget_Helper_Form_Element_Text('IndexImage', NULL, NULL, _t('首页大图'), _t('填入一个图片url，显示在页面顶部，不填则显示白色'));
    $form->addInput($IndexImage);
	
    $pjax = new Typecho_Widget_Helper_Form_Element_Select('pjax',array('0'=>'不启用','1'=>'启用'),'0','启用 PJAX (BETA)','是否启用 PJAX。如果你发现站点有点不对劲，又不知道这个选项是啥意思，请关闭此项。');
    $form->addInput($pjax);
}

/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {
    $banner = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL, _t('文章缩略图'), _t('填入一个图片url作为缩略图，显示在文章列表和文章页面顶部，不填写则没有缩略图'));
    $layout->addItem($banner);
}

// 获取浏览器信息
function getBrowser($agent)
{
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $outputer = '<i class="ua-icon icon-ie"></i>&nbsp;&nbsp;Internet Explore';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
      $str1 = explode('Firefox/', $regs[0]);
$FireFox_vern = explode('.', $str1[1]);
        $outputer = '<i class="ua-icon icon-firefox"></i>&nbsp;&nbsp;FireFox';
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
      $str1 = explode('Maxthon/', $agent);
$Maxthon_vern = explode('.', $str1[1]);
        $outputer = '<i class="ua-icon icon-edge"></i>&nbsp;&nbsp;MicroSoft Edge';
    } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
$outputer = '<i class="ua-icon icon-360"></i>&nbsp;&nbsp;360极速浏览器';
    } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Edge/', $regs[0]);
$Edge_vern = explode('.', $str1[1]);
        $outputer = '<i class="ua-icon icon-edge"></i>&nbsp;&nbsp;MicroSoft Edge';
    } else if (preg_match('/UC/i', $agent)) {
              $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
        $outputer = '<i class="ua-icon icon-uc"></i>&nbsp;&nbsp;UC浏览器';
    }  else if (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
                  $str1 = explode('rowser/',  $agent);
$QQ_vern = explode('.', $str1[1]);
        $outputer = '<i class= "ua-icon icon-qq"></i>&nbsp;&nbsp;QQ浏览器';
    } else if (preg_match('/UBrowser/i', $agent, $regs)) {
              $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
        $outputer = '<i class="ua-icon icon-uc"></i>&nbsp;&nbsp;UC浏览器';
    }  else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $outputer = '<i class= "ua-icon icon-opera"></i>&nbsp;&nbsp;Opera';
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
$str1 = explode('Chrome/', $agent);
$chrome_vern = explode('.', $str1[1]);
        $outputer = '<i class="ua-icon icon-chrome""></i>&nbsp;&nbsp;Google Chrome';
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
         $str1 = explode('Version/',  $agent);
$safari_vern = explode('.', $str1[1]);
        $outputer = '<i class="ua-icon icon-safari"></i>&nbsp;&nbsp;Safari';
    } else{
        $outputer = '<i class="ua-icon icon-chrome"></i>&nbsp;&nbsp;Google Chrome';
    }
    echo $outputer;
}
// 获取操作系统信息
function getOs($agent)
{
    $os = false;
 
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class= "ua-icon icon-win1"></i>&nbsp;&nbsp;Windows Vista&nbsp;/&nbsp;';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class= "ua-icon icon-win1"></i>&nbsp;&nbsp;Windows 7&nbsp;/&nbsp;';
        } else if (preg_match('/nt 6.2/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class="ua-icon icon-win2"></i>&nbsp;&nbsp;Windows 8&nbsp;/&nbsp;';
        } else if(preg_match('/nt 6.3/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class= "ua-icon icon-win2"></i>&nbsp;&nbsp;Windows 8.1&nbsp;/&nbsp;';
        } else if(preg_match('/nt 5.1/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class="ua-icon icon-win1"></i>&nbsp;&nbsp;Windows XP&nbsp;/&nbsp;';
        } else if (preg_match('/nt 10.0/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class="ua-icon icon-win2"></i>&nbsp;&nbsp;Windows 10&nbsp;/&nbsp;';
        } else{
            $os = '&nbsp;&nbsp;<i class="ua-icon icon-win2"></i>&nbsp;&nbsp;Windows X64&nbsp;/&nbsp;';
        }
    } else if (preg_match('/android/i', $agent)) {
    if (preg_match('/android 9/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class="ua-icon icon-android"></i>&nbsp;&nbsp;Android Pie&nbsp;/&nbsp;';
        }
    else if (preg_match('/android 8/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class="ua-icon icon-android"></i>&nbsp;&nbsp;Android Oreo&nbsp;/&nbsp;';
        }
    else{
            $os = '&nbsp;&nbsp;<i class="ua-icon icon-android"></i>&nbsp;&nbsp;Android&nbsp;/&nbsp;';
    }
    }
    else if (preg_match('/ubuntu/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="ua-icon icon-ubuntu"></i>&nbsp;&nbsp;Ubuntu&nbsp;/&nbsp;';
    } else if (preg_match('/linux/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class= "ua-icon icon-linux"></i>&nbsp;&nbsp;Linux&nbsp;/&nbsp;';
    } else if (preg_match('/iPhone/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="ua-icon icon-apple"></i>&nbsp;&nbsp;iPhone&nbsp;/&nbsp;';
    } else if (preg_match('/mac/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="ua-icon icon-mac"></i>&nbsp;&nbsp;MacOS&nbsp;/&nbsp;';
    }else if (preg_match('/fusion/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="ua-icon icon-android"></i>&nbsp;&nbsp;Android&nbsp;/&nbsp;';
    } else {
        $os = '&nbsp;&nbsp;<i class="ua-icon icon-linux"></i>&nbsp;&nbsp;Linux&nbsp;/&nbsp;';
    }
    echo $os;
}