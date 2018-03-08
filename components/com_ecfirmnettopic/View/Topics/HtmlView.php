<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Site\View\Topics;

use Joomla\Component\EcfirmNetBase\Site\Helper\EcUrl;
use Joomla\Component\EcfirmNetBase\Site\View\EcListHtmlView;

defined('_JEXEC') or die;

class HtmlView extends EcListHtmlView
{

	protected function getItems()
	{
		$model = $this->getModel('topiccat');
		$itemTopiccat = $model->getItem(EcUrl::getMenuActiveQuery('topiccat'));
		$this->topiccatTitle = $itemTopiccat->title;
		$this->topiccatBody = $itemTopiccat->body;

		$model = $this->getModel($this->getName());
		$model->setState('enabledPlugin', true);
		//$items = parent::getItems();
		$items = $model->getItems();

		$this->filterForm = $this->get('FilterForm'); //@IMPORTANT: filter call sequence
		//$this->activeFilters = $this->get('ActiveFilters');

		return $items;
	}
}