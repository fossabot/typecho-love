<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 热评文章
 *
 * @author buxia97
 * @category typecho
 * @package Widget
 * @copyright Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license GNU General Public License 2.0
 * @version $Id$
 */
class Widget_Contents_Post_Comments extends Widget_Abstract_Contents
{
    /**
     * 执行函数
     *
     * @access public
     * @return void
     */
	public function execute()
	{
		$this->parameter->setDefault(array('pageSize' => $this->options->postsListSize));
        $this->db->fetchAll($this->select()
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.created < ?', $this->options->time)
        ->where('table.contents.type = ?', 'post')
        ->order('commentsNum', Typecho_Db::SORT_DESC)
        ->limit($this->parameter->pageSize), array($this, 'push'));
	}
}
