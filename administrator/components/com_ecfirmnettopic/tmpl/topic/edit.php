<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDebug;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('behavior.tabstate');

$app = Factory::getApplication();
$input = $app->input;
$urlForm = Route::_('index.php?option=com_ectopic&layout=edit&topic=' . (int)$this->item->topic);
?>



<form action="<?php echo $urlForm; ?>" method="post" name="adminForm" id="item-form" class="form-validate">

	<?php echo LayoutHelper::render('joomla.edit.title_alias', $this); ?>

	<div>
	<?php echo HTMLHelper::_('bootstrap.startTabSet', 'myTab', array('active' => 'topic')); ?>

		<?php echo HTMLHelper::_('bootstrap.addTab', 'myTab', 'topic', Text::_('COM_ECTOPIC_TOPIC_TOPIC')); ?>
		<div class="row">
			<div class="col-md-9">
				<?php echo $this->form->getLabel('body'); ?>
				<?php echo $this->form->getInput('body'); ?>
			</div>
			<div class="col-md-3">
				<div class="card card-light">
					<div class="card-body">
					<?php foreach ($this->form->getFieldset('topic') as $field) : ?>
						<?php if($field->fieldname == 'body') continue; ?>
						<?php if(!($field->hidden)) : ?>
							<?php echo $field->label; ?>
							<?php echo $field->input; ?>
						<?php endif; ?>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php echo HTMLHelper::_('bootstrap.endTab'); ?>

		<?php echo HTMLHelper::_('bootstrap.addTab', 'myTab', 'options', Text::_('COM_ECTOPIC_TOPIC_OPTIONS')); ?>
		<div class="row">

		</div>
		<?php echo HTMLHelper::_('bootstrap.endTab'); ?>

	<?php echo HTMLHelper::_('bootstrap.endTabSet'); ?>
	</div>

</form>