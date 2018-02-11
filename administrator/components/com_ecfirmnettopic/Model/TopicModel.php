<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\Model;

defined('_JEXEC') or die;

use Joomla\Component\EcfirmNetBase\Administrator\Model\EcItemAdminModel;

class TopicModel extends EcItemAdminModel
{

	/**
	 * Abstract method for getting the form from the model.
	 * @param   array $data Data for the form.
	 * @param   boolean $loadData True if the form is to load its own data (default case), false if not.
	 * @return  \JForm|boolean  A \JForm object on success, false on failure
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// TODO: Implement getForm() method.
	}
}