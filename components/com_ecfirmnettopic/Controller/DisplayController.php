<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Site\Controller;

use Joomla\Component\EcfirmNetBase\Site\Controller\EcDisplayController;

defined('_JEXEC') or die;

class DisplayController extends EcDisplayController
{

	/**
	 * Typical view method for MVC based architecture
	 * This function is provide as a default implementation, in most cases
	 * you will need to override it in your own controllers.
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   array    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link \JFilterInput::clean()}.
	 * @return  static  A \JControllerLegacy object to support chaining.
	 * @since   3.0 BaseController
	 */
	public function display($cachable = false, $urlparams = array())
	{
		$nameView = $this->input->get('view');
		switch ($nameView) {
			case 'topics':
				$this->setViewModel('topiccat');
				break;
		}
		return parent::display($cachable, $urlparams);
	}
}