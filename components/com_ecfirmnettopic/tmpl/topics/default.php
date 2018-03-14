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
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDatetime;
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDebug;

defined('_JEXEC') or die;

HTMLHelper::_('behavior.multiselect');
//HTMLHelper::_('behavior.tabstate');

HTMLHelper::_('stylesheet', '/media/com_ecfirmnettopic/css/admin.css', ['version' => 'auto']);

$urlForm = Route::_(Uri::getInstance());

$columns = 7; //FIXME

$nameKey = $this->nameKey;
$optionCom = $this->optionCom;
$topiccatTitle = JHtml::_('string.truncateComplex', $this->topiccatTitle, 70);
$topiccatBody = nl2br($this->topiccatBody);
$sept = '&nbsp;&middot;&nbsp;';

//EcDebug::lp($this->items[0]);
//EcDebug::lp($this->filterForm);
//EcDebug::lp($this->pagination);
?>



<div class="container">


	<div class="row">
		<div class="col-md-12">
			<div class="float-left">
				<h3>
					<?php echo $topiccatTitle; ?>
					<small> <?php echo $topiccatBody; ?> </small>
				</h3>
			</div>
			<div class="float-right">
				<a class="btn btn-secondary" href="#" role="button">TODO ADD</a>
			</div>
		</div>
	</div>


	<div class="row">
		<form action="<?php echo $urlForm; ?>" method="post" name="adminForm" id="adminForm" class="col-md-12">

			<div id="j-main-container" class="j-main-container">

				<div class="float-right m-2 p-2">
					<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
				</div>

				<?php if (empty($this->items)) : ?>
				<joomla-alert type="warning">
					<?php echo Text::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
				</joomla-alert>

				<?php else : ?>
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
						<?php
						$title = HTMLHelper::_('string.truncateComplex', $item->title, 70, false);
						$title = '<a href="' . Route::_('index.php?option=' . $optionCom . '&view=' . $nameKey . '&topic=' . $item->topic) . '"><div>' . $title . '</div></a>';
						$datetime = EcDatetime::interval($item->created);
						if($item->created < $item->modified)
							$datetime = $datetime . $seperator . EcDatetime::interval($item->modified);
						$username = '<a href="' . Route::_('index.php?option=com_ecuser&view=user&user=' .$item->user).'">'.$item->username.'</a>';
						$hits = Text::sprintf('COM_ECTOPIC_TOPIC_HITS_NUMBER', $item->hits);

						$topiccmt = ($item->topiccmt > 0) ? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_TOPICCMT_NUMBER', $item->topiccmt) : null;
						$topiclike = ($item->topiclike) ? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_TOPICLIKE_NUMBER', $item->topiclike) : null;
						$files = json_decode($item->files, true); //EcDebug::lp(count($files));
						$imgs = json_decode($item->imgs, true); //EcDebug::lp(count($imgs));
						$countFile = count($files);
						$countImg = (count($imgs))/2;
						$existFile =  (($countFile > 0) && (array_key_exists('file', $files)) && (!empty($files['file'])));
						$existImg =  (($countImg > 0) && (array_key_exists('img', $imgs)) && (!empty($imgs['img'])));
						$numberFile = ($existFile) ? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_FILE_NUMBER', $countFile) : null;
						$numberImg = ($existImg) ? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_IMG_NUMBER', $countImg) : null;
						?>
						<tr class="row<?php echo ($i % 2)?>" sortable-group-id="<?php echo $item->topic; ?>">
							<td class="">
								<div><?php echo $title; ?></div>
								<div><small><?php echo $datetime . $sept . $hits . $topiccmt . $topiclike . $numberFile . $numberImg; ?></small></div>
							</td>
							<td class="text-center"><?php echo $username; ?></td>
						</tr>

					<?php endforeach; ?>
					</tbody>

				</table>
				<?php endif; ?>

				<input type="hidden" name="task" value="">
				<input type="hidden" name="boxchecked" value="0">
				<?php echo HTMLHelper::_('form.token'); ?>

			</div>

		</form>
	</div>


</div>