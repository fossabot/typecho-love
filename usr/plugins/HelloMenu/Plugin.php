<?php
/**
 * 文章目录树插件
 *
 * @package HelloMenu
 * @author BigCoke
 * @version 1.0.0
 * @link https://cokewithice.com
 */

class HelloMenu_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->header = array('HelloMenu_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('HelloMenu_Plugin', 'footer');
        return "插件启动成功";
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        return "插件禁用成功";
    }

    
    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
	    $ContentClass = new Typecho_Widget_Helper_Form_Element_Text('ContentClass', NULL, NULL, _t('文章内容父元素class'), _t('输出文章内容的父元素的class'));
        $form->addInput($ContentClass);
		$Window = new Typecho_Widget_Helper_Form_Element_Checkbox('Window', array('Window' => '文章目录以文字列表形式出现'), false, _t('高级设置'), _t('勾选后在相应的地方写上<code style="color:black;background:#F6F6EF;border-radius:3px;">&lt;ul class="widget-list" id="AnchorContent"&gt; &lt;/ul&gt;</code> 即可输出文章目录，<font color="red">注:文字目录与弹窗目录无法同时兼容，也就是说开启此项后，弹窗输出目录的方式将会失效，若关闭，文字列表目录会失效。</font>'));
		$form->addInput($Window);
		echo '<p>填写正确的class之后，将可点击元素(例如button)的onclick属性设置为<code style="background:#F1F1F1;border-radius:3px;color:red;padding:1.5px">OpenDirectoryWindow()</code>即可点击开启弹窗目录</p>';
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {}


    /**
     * 页头输出相关代码
     *
     * @access public
     * @param unknown header
     * @return unknown
     */
    public static function header()
    {
		$options = Helper::options()->plugin('HelloMenu');
		$path = Helper::options()->pluginUrl . '/HelloMenu/';
		echo '<!-- HelloMenu引入css 作者:BigCoke -->';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . 'style.css" />';
		if (!$options->Window) {
	      echo '<!-- HelloMenu遮罩以及窗口 -->';
	      echo '<div class="DarkCover Ready" id="DarkCover"> </div>';
		  echo '<div class="TreeWindow Ready" id="TreeWindow"><h2>文章目录<button class="CloseDirectoryWindow" onclick="CloseDirectoryWindow()">×</button></h2><hr /> <ul class="widget-list" id="AnchorContent"> </ul> </div>';
		}
    }


    /**
     * 页脚输出相关代码
     *
     * @access public
     * @param unknown footer
     * @return unknown
     */
    public static function footer()
    {
		$options = Helper::options()->plugin('HelloMenu');
	    $path = Helper::options()->pluginUrl . '/HelloMenu/';

		echo '<!-- HelloMenu引入js 作者:BigCoke -->';
        echo '<script type="text/javascript">
            $(".' . $options->ContentClass . '").find("h2,h3,h4,h5,h6").each(function(i,item){
            var tag = $(item).get(0).localName;
            $(item).attr("id","wow"+i);
            $("#AnchorContent").append(\'<li class="widget-list-item"><a class="new\'+tag+\' anchor-link" onclick="return false;" href="#" link="#wow\'+i+\'">\'+$(this).text()+\'</a></li>\');
            $(".newh2").css("margin-left",0);
            $(".newh3").css("margin-left",10);
            $(".newh4").css("margin-left",20);
            $(".newh5").css("margin-left",30);
            $(".newh6").css("margin-left",40);
            });
            $(".anchor-link").click(function(){
              $("html,body").animate({scrollTop: $($(this).attr("link")).offset().top-50}, 300);
            });
            </script>';
        echo '<script type="text/javascript" src="' . $path . 'Window.js"></script>';
    }
}




