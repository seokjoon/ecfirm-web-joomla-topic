<?php
/**
 * @package joomla.ecfirm.net
 * @copyright Copyright (C) joomla.ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\Field;

defined('JPATH_BASE') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\ListField;
use Joomla\CMS\Form\FormHelper;
use RuntimeException;

FormHelper::loadFieldClass('list');

class TopiccatField extends ListField
{

	/**
	 * The form field type.
	 * @var		string
	 * @since   1.6
	 */
	protected $type = 'Topiccat';

	/**
	 * Method to get the field options.
	 * @return  array  The field option objects.
	 * @since   1.6
	 */
	protected function getOptions()
	{
		$options = array();

		$db = Factory::getDbo();
		$query = $db->getQuery(true)
			->select('tc.topiccat as value, tc.title as text')
			->from('#__ec_topiccat as tc');
		$db->setQuery($query);

		try {
			$options = $db->loadObjectList();
		} catch (RuntimeException $e) {
			Factory::getApplication()->enqueueMessage($db->getMessage(), 'error');
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}