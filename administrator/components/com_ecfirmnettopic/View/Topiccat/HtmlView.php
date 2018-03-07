<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\View\Topiccat;

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\Component\EcfirmNetBase\Administrator\View\EcItemAdminHtmlView;

class HtmlView extends EcItemAdminHtmlView
{

	protected function addToolbar()
	{
		$isNew = ($this->item->topiccat == 0);
		$canDo = $this->canDo;
		ToolbarHelper::title(Text::_('COM_ECTOPIC_TOPICCAT'), 'pencil-2 article-add');
		if ($isNew && $canDo->get('core.create')) {
			ToolbarHelper::apply('topiccat.apply');
			ToolbarHelper::save('topiccat.save');
		} elseif ($canDo->get('core.edit') || ($canDo->get('core.edit.own'))) {
			ToolbarHelper::apply('topiccat.apply');
			ToolbarHelper::save('topiccat.save');
		}
		parent::addToolbar();
	}
}