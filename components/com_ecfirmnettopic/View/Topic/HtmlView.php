<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

namespace Joomla\Component\EcfirmNetTopic\Site\View\Topic;

defined('_JEXEC') or die;

use Joomla\Component\EcfirmNetBase\Site\View\EcItemHtmlView;

class HtmlView extends EcItemHtmlView
{

	protected function getItem($valueKey = 0)
	{
		$model = $this->getModel($this->getName());
		$model->setState('enabledPlugin', true);
		return parent::getItem($valueKey);
	}
}