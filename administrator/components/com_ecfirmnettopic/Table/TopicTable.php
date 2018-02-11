<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

class TopicTable extends Table
{

	/**
	 * Constructor
	 *
	 * @param   \JDatabaseDriver  $db  Database object
	 *
	 * @since  2.5
	 */
	public function __construct(\JDatabaseDriver $db)
	{
		$this->typeAlias = 'com_EcfirmNetTopic.topic';

		parent::__construct('#__ec_topic', 'topic', $db);
	}
}