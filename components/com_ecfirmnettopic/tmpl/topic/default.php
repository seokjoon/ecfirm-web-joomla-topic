<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDatetime;
use Joomla\Component\EcfirmNetBase\Site\Helper\EcDebug;

defined('_JEXEC') or die;

$item = $this->item; //EcDebug::lp($item);
$optionCom = $this->optionCom;
$nameKey = $this->nameKey;
$valueKey = (is_object($item)) ? $item->$nameKey : 0;

$user = Factory::getUser($item->user); //EcDebug::lp($user);
$username = (!(empty($user->id))) ? '<a href="' . Route::_('index.php?option=com_ecuser&view=user&user=' . $item->user) . '">' . $user->username . '</a>' : null;

$urlPlural = Route::_('index.php?option=' . $optionCom . '&view=' . $nameKey . 's&&topiccat='.$item->topiccat);
$sept = '&nbsp;&middot;&nbsp;';
$datetime = EcDatetime::interval($item->created);
if($item->created < $item->modified)
	$datetime = $datetime . $sept . EcDatetime::interval($item->modified);
$title = $item->title;
$hits = Text::sprintf('COM_ECTOPIC_TOPIC_HITS_NUMBER', $item->hits);
$topiccmt = ($item->topiccmt > 0)
	? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_TOPICCMT_NUMBER', $item->topiccmt) : null;
$topiclike = ($item->topiclike)
	? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_TOPICLIKE_NUMBER', $item->topiclike) : null;
//$topiccatTitle = HTMLHelper::_('string.truncateComplex', $item->topiccatTitle, 15, false);
$files = json_decode($item->files, true); //EcDebug::lp(count($files));
$imgs = json_decode($item->imgs, true); //EcDebug::lp(count($imgs));
$countFile = count($files);
$countImg = (count($imgs)) / 2;
$existFile = (($countFile > 0) && (array_key_exists('file', $files)) && (!empty($files['file'])));
$existImg = (($countImg > 0) && (array_key_exists('img', $imgs)) && (!empty($imgs['img'])));
$numberFile = ($existFile) ? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_FILE_NUMBER', $countFile) : null;
$numberImg = ($existImg) ? $sept . Text::sprintf('COM_ECTOPIC_TOPIC_IMG_NUMBER', $countImg) : null;
?>



<div class="container">
	<div class="text-right">
		<div class="btn-group">
			<a class="btn btn-secondary" href="#" role="button">TODO LIST</a>
			<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="sr-only"></span>
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item btn-secondary" href="#">TODO EDIT</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item btn-secondary" href="#">TODO DELETE</a>
			</div>
		</div>
	</div>
</div>



<div class="container">
	<div>
		<h3><?php echo $title; ?></h3>
	</div>
	<div class="row mb-2">
		<div class="float-left col-md-8">
			<div class="text-center">
				<?php echo $datetime . $sept . $hits . $topiccmt . $topiclike . $numberFile . $numberImg; ?>
			</div>
		</div>
		<div class="float-right col-md-4">
			<div class="text-right"><?php echo $username; ?></div>
		</div>
	</div>
	<div class="row mb-2">
		<div class="border col-md-12"> <?php echo $item->body; ?> </div>
	</div>
</div>



<div class="container">
	<?php if($existImg) : //FIXME ?>
	<div align="center" style="margin: 10px;">
		<a href="<?php echo Uri::base() . $imgs['img']; ?>" target="_new">
			<img class="media-object thumbnail" src="<?php echo Uri::base() . $imgs['imgthumb']; ?>" alt="" />
		</a>
	</div>
	<?php endif; ?>

	<?php if($existFile) : //FIXME ?>
	<div>
		<a href="<?php echo Uri::base() . $files['file']; ?>"><?php echo basename($files['file']); ?></a>
	</div>
	<?php endif; ?>
</div>
