<form <?php echo $attributes; ?>>

	<input type="hidden" name="_redirectBack" value="<?php echo e($backUrl); ?>" />
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

	<div class="panel-heading nav-tabs-custom" role="tabpanel" style="padding-bottom: 0">
		<ul class="nav nav-tabs" role="tablist">
			<?php $active = null; ?>
			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $_tmp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
					if (is_null($active)) {
						$active = $label;
					}
				?>
				<li role="presentation" <?php echo ($active == $label) ? 'class="active"' : ''; ?>>
					<a href="#<?php echo e(md5($label)); ?>" aria-controls="<?php echo e(md5($label)); ?>" role="tab" data-toggle="tab"><?php echo e($label); ?></a>
				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $formItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div role="tabpanel" class="tab-pane <?php echo ($active == $label) ? 'in active' : ''; ?>" id="<?php echo e(md5($label)); ?>">
					<?php $__currentLoopData = $formItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php echo $item->render(); ?>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>

	<?php echo $buttons->render(); ?>

</form>