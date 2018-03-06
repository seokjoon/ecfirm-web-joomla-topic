<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\Helper;

use JHtmlSidebar;
use Joomla\CMS\Language\Text;
use Joomla\Component\EcfirmNetBase\Administrator\Helper\EcAdminHelper;

defined('_JEXEC') or die;

class EcfirmNetTopicHelper extends EcAdminHelper
{

	/**
	 * Configure the Linkbar. Must be implemented by each extension.
	 * @param   string  $vName  The name of the active view.
	 * @return  void
	 * @since   3.1 ContentHelper
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(Text::_('COM_ECTOPIC_SUBMENU_TOPICCATS'), 'index.php?option=com_ectopic&view=topiccats', $vName == 'topiccats');
		JHtmlSidebar::addEntry(Text::_('COM_ECTOPIC_SUBMENU_TOPICS'), 'index.php?option=com_ectopic&view=topics', $vName == 'topics');
	}

	public static function getStateValues()
	{
		return array(
			'0' => Text::_('COM_ECTOPIC_STATE_VALUE_SELECT'),
			'-1' => Text::_('COM_ECTOPIC_STATE_VALUE_DISABLE'),
			'1' => Text::_('COM_ECTOPIC_STATE_VALUE_ENABLE')
		);
	}
}