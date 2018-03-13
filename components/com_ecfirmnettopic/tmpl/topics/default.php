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

HTMLHelper::_('stylesheet', '/media/com_ecfirmnettopic/css/admin.css', ['version' => 'auto']);

$urlForm = Route::_(Uri::getInstance());

$columns = 7; //FIXME

$topiccatTitle = JHtml::_('string.truncateComplex', $this->topiccatTitle, 70);
$topiccatBody = nl2br($this->topiccatBody);

//EcDebug::lp($this->items[0]);
//EcDebug::lp($this->filterForm);
//EcDebug::lp($this->pagination);
?>



<div class="container">


	<div class="row">
		<div class="col-md-12">
		<div class="float-left">
			<fieldset>
				<legend><?php echo $topiccatTitle; ?></legend>
				<small><?php echo $topiccatBody; ?></small>
			</fieldset>
		</div>
		<div class="float-right">
			TODO BTN ADD
		</div>
		</div>
	</div>


	<div class="row">
	<form action="<?php echo $urlForm; ?>" method="post" name="adminForm" id="adminForm">

		<div class="col-md-12">

			<div id="j-main-container" class="j-main-container">

				<div class="float-right m-2 p-2">
					<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
				</div>

				<?php if (empty($this->items)) : ?>
				<joomla-alert type="warning">
					<?php echo Text::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
				</joomla-alert>

				<?php else : ?>
				<!-- table class="table table-striped" id="categoryList" -->
				<table class="category table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center col-9">
								<?php echo Text::_('COM_ECTOPIC_TOPICS_TITLE_HEADER'); ?>
							</th>
							<th class="text-center col-3">
								<?php echo Text::_('COM_ECTOPIC_TOPICS_USER_HEADER'); ?>
							</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<td colspan="<?php echo $columns; ?>">
								<div class="w-100">
									<p class="counter float-right pt-3 pr-2">
										<?php echo $this->pagination->getPagesCounter(); ?>
									</p>
									<?php echo $this->pagination->getPagesLinks(); ?>
								</div>
								<?php //echo $this->pagination->getListFooter(); ?>
							</td>
						</tr>
					</tfoot>

					<tbody>
					<?php foreach ($this->items as $i => $item) : ?>
						<tr class="row<?php echo ($i % 2)?>" sortable-group-id="<?php echo $item->topic; ?>">
							<td class="">
								<a href="<?php echo Route::_('index.php?option=com_ecfirmnettopic&view=topic&topic=') . $item->topic; ?>" title="<?php echo Text::_('JACTION_EDIT'); ?>"><div><?php echo $item->title; ?></div></a>
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
	</form>
	</div>


</div>