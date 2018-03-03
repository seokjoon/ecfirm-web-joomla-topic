<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\View\Topic;

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\Component\EcfirmNetBase\Administrator\View\EcItemAdminHtmlView;

class HtmlView extends EcItemAdminHtmlView
{

	protected function addToolbar()
	{
		$isNew = ($this->item->topic == 0);
		$canDo = $this->canDo;
		ToolbarHelper::title(Text::_('COM_ECTOPIC_TOPIC'), 'pencil-2 article-add');
		if ($isNew && $canDo->get('core.create')) {
			ToolbarHelper::apply('topic.apply');
			ToolbarHelper::save('topic.save');
		} elseif ($canDo->get('core.edit') || ($canDo->get('core.edit.own'))) {
			ToolbarHelper::apply('topic.apply');
			ToolbarHelper::save('topic.save');
		}
		parent::addToolbar();
	}
}