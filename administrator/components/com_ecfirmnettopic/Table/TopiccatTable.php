<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\Table;

defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class TopiccatTable extends Table
{

	/**
	 * Constructor
	 * @param   \JDatabaseDriver  $db  Database object
	 * @since  2.5 Table
	 */
	public function __construct(DatabaseDriver $db)//(\JDatabaseDriver $db)
	{
		$this->typeAlias = 'com_ecfirmnettopiccat.topiccat';

		parent::__construct('#__ec_topiccat', 'topiccat', $db);
	}
}