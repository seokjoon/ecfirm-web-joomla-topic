<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Administrator\Model;

use Joomla\Component\EcfirmNetBase\Administrator\Model\EcListAdminModel;
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDebug;

defined('_JEXEC') or die;

class TopicsModel extends EcListAdminModel
{

	/**
	 * @param   array  $config  An optional associative array of configuration settings.
	 * @see     JModelLegacy
	 * @since   12.2 JModelList
	*/
	public function __construct($config = array())
	{
		parent::__construct($config);
		if (empty($this->keywords))
			$this->keywords = array(
				'fullordering',
				'modified',
				'search',
				'topiccat',
			);
	}

	/**
	 * Method to get a JDatabaseQuery object for retrieving the data set from a database.
	 * @return  JDatabaseQuery   A JDatabaseQuery object to retrieve the data set.
	 * @since   12.2 JModelList
	*/
	protected function getListQuery()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('t.*') //FIXME
			->from('#__ec_topic as t')
			->order('t.topic DESC');

		$query->select('ju.username as username')
			->join('INNER', '#__users as ju ON ju.id =t.user');

		$search = $this->getState('filter.search');
		if (!(empty($search)))
			$query->where('(t.title LIKE ' . $db->quote('%' . $search . '%') . ' OR t.body LIKE ' . $db->quote('%' . $search . '%') . ')');

		//EcDebug::lp($query->__toString());//$this->setError($query);
		return $query;
	}
}