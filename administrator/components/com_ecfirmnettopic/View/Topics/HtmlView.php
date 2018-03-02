<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\View\Topics;

use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\Component\EcfirmNetBase\Administrator\View\EcListAdminHtmlView;

defined('_JEXEC') or die;

class HtmlView extends EcListAdminHtmlView
{

	protected function addToolbar()
	{
		parent::addToolbar();
		//$user = Factory::getUser();
		//$bar = Toolbar::getInstance('toolbar');
		$canDo = $this->canDo;
		if ($canDo->get('core.create'))
			ToolbarHelper::addNew('topic.add');
		if (($canDo->get('core.edit')) || ($canDo->get('core.edit.own')))
			ToolbarHelper::editList('topic.edit');
		if ($canDo->get('core.delete'))
			ToolbarHelper::deleteList('', 'topics.delete', 'COM_ECTOPIC_DELETE');
	}
}