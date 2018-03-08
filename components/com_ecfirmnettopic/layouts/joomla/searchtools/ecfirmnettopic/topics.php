<?php
/**
 * @package ecfirm.net
 * @copyright Copyright (C) ecfirm.net. All rights reserved.
 * @license GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

$data = $displayData;

$filter = $data['view']->filterForm->getGroup('filter');
$order = $data['view']->filterForm->getGroup('order');
$list = $data['view']->filterForm->getGroup('list');
?>


<?php if ($list) : ?>
	<div class="ordering-select">
		<?php foreach ($list as $fieldName => $field) : ?>
			<div class="js-stools-field-list">
				<?php echo $field->input; ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>