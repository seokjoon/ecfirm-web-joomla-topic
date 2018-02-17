<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Dispatcher\Dispatcher;
use Joomla\Input\Input;

/**
 * Dispatcher class for com_users
 *
 * @since  4.0.0
 */
class EcfirmNetTopicDispatcher extends Dispatcher
{
	/**
	 * The extension namespace
	 *
	 * @var    string
	 *
	 * @since  4.0.0
	 */
	protected $namespace = 'Joomla\\Component\\EcfirmNetTopic';

	/**
	 * Constructor for Dispatcher
	 * @param   CMSApplication  $app    The application instance
	 * @param   Input           $input  The input instance
	 * @since   4.0.0
	 */
	public function __construct(CMSApplication $app, Input $input = null)
	{
		parent::__construct($app, $input);

		//EcConst::setPrefix('ecfirmnet');
	}
}
