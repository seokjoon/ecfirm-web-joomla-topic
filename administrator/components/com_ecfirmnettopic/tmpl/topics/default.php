<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDebug;

defined('_JEXEC') or die;

HTMLHelper::_('behavior.multiselect');
//HTMLHelper::_('behavior.tabstate');

$urlForm = Route::_(Uri::getInstance());

$columns = 7; //FIXME

//EcDebug::lp($this->filterForm);
//EcDebug::lp($this->items[0]);
?>



<form action="<?php echo $urlForm; ?>" method="post" name="adminForm" id="adminForm">
	<div class="row">
		<?php if(!empty($this->sidebar)) : ?>
		<div id="j-sidebar-container" class="col-md-2">
			<?php echo $this->sidebar; ?>
		</div>
		<?php endif; ?>

		<div class="<?php if (!empty($this->sidebar)) echo 'col-md-10'; else echo 'col-md-12'; ?>">
			<div id="j-main-container" class="j-main-container">

				<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>

				<?php if (empty($this->items)) : ?>
				<joomla-alert type="warning">
					<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
				</joomla-alert>

				<?php else : ?>
				<table class="table table-striped" id="categoryList">
					<thead>
						<tr>
							<th style="width: 1%" class="text-center">
								<?php echo HTMLHelper::_('grid.checkall'); ?>
							</th>
							<th class="text-center">
								<?php echo Text::_('COM_ECTOPIC_TOPICS_TITLE_HEADER'); ?>
							</th>
							<th class="text-center">
								<?php echo Text::_('COM_ECTOPIC_TOPICS_USER_HEADER'); ?>
							</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<td colspan="<?php echo $columns; ?>">
								<?php echo $this->pagination->getListFooter(); ?>
							</td>
						</tr>
					</tfoot>

					<tbody>
						<?php foreach ($this->items as $i => $item) : ?>
						<tr class="row<?php echo ($i % 2)?>" sortable-group-id="<?php echo $item->topic; ?>">
							<td class="text-center">
								<?php echo HTMLHelper::_('grid.id', $i, $item->topic); ?>
							</td>
							<td class="">
								<a href="<?php echo Route::_('index.php?option=com_ecfirmnettopic&task=topic.edit&topic=').$item->topic; ?>" title="<?php echo Text::_('JACTION_EDIT'); ?>"><?php echo $item->title; ?></a>
							</td>
							<td class="text-center">
								<?php echo $item->username; ?>
							</td>
						</tr>

						<?php endforeach; ?>
					</tbody>

				</table>
				<?php endif; ?>

				<input type="hidden" name="task" value="">
				<input type="hidden" name="boxchecked" value="0">
				<?php echo HTMLHelper::_('form.token'); ?>

			</div>
		</div>
	</div>
</form>
