<?php
/**
 * @package joomla.ecfirm.net
 * @copyright Copyright (C) joomla.ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\Field;

defined('JPATH_BASE') or die;

use Joomla\CMS\Form\Field\ListField;
use Joomla\CMS\Form\FormHelper;
use Joomla\Component\EcfirmNetTopic\Administrator\Helper\EcfirmNetTopicHelper;

FormHelper::loadFieldClass('list');

class TopicstateField extends ListField
{

	/**
	 * The form field type.
	 * @var		string
	 * @since   1.6
	 */
	protected $type = 'Topicstate';

	/**
	 * Method to get the field options.
	 * @return  array  The field option objects.
	 * @since   1.6
	 */
	protected function getOptions()
	{
		$options = EcfirmNetTopicHelper::getStateValues();

		return $options;
	}
}