<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\Controller;

use Joomla\Component\EcfirmNetBase\Administrator\Controller\EcItemAdminController;
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDebug;

defined('_JEXEC') or die;


class TopicController extends EcItemAdminController
{

	public function save($key = null, $urlVar = null)
	{
		//$jform = $this->input->post->get('jform', array(), 'array'); EcDebug::lp($jform, true);

		return parent::save($key, $urlVar);
	}
}