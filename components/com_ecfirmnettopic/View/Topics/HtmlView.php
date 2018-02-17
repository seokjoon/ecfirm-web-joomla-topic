<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Site\View\Topics;

use Joomla\Component\EcfirmNetBase\Site\View\EcListHtmlView;

defined('_JEXEC') or die;

class HtmlView extends EcListHtmlView
{

	/**
	 * Execute and display a template script.
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 * @return  mixed  A string if successful, otherwise an Error object.
	 * @see     \JViewLegacy::loadTemplate()
	 * @since   3.0 HtmlView
	 */
	public function display($tpl = null)
	{

		return parent::display($tpl);
	}
}