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

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('behavior.tabstate');

$app = Factory::getApplication();
$input = $app->input;
$urlForm = Route::_('index.php?option=com_ecfirmnettopic&layout=edit&topiccat=' . (int)$this->item->topiccat);
?>



<form action="<?php echo $urlForm; ?>" method="post" name="adminForm" id="item-form" class="form-validate">

	<?php echo LayoutHelper::render('joomla.edit.title_alias', $this); ?>

	<div>
		<?php echo HTMLHelper::_('bootstrap.startTabSet', 'myTab', array('active' => 'topiccat')); ?>

			<?php echo HTMLHelper::_('bootstrap.addTab', 'myTab', 'topiccat', Text::_('COM_ECTOPIC_TOPIC_TOPIC')); ?>
			<div class="row">
				<div class="col-md-9">
					<fieldset class="adminform">
						<?php //echo $this->form->getLabel('body'); ?>
						<?php echo $this->form->getInput('body'); ?>
					</fieldset>
				</div>
				<div class="col-md-3">
					<div class="card card-light">
						<div class="card-body">
						<?php foreach ($this->form->getFieldset('topiccat') as $field) : ?>
							<?php if($field->fieldname == 'title') continue; ?>
							<?php if($field->fieldname == 'body') continue; ?>
							<?php if(!($field->hidden)) echo $field->label; ?>
							<?php echo $field->input; ?>
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

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="return" value="<?php echo $input->getCmd('return'); ?>" />
		<?php echo HTMLHelper::_('form.token'); ?>
	</div>

</form>