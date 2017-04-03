<div class="form-group form-element-textarea <?php echo e($errors->has($name) ? 'has-error' : ''); ?>">
	<label for="<?php echo e($name); ?>" class="control-label">
		<?php echo e($label); ?>


		<?php if($required): ?>
			<span class="form-element-required">*</span>
		<?php endif; ?>
	</label>

	<?php echo $__env->make(AdminTemplate::getViewPath('form.element.partials.helptext'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<textarea <?php echo $attributes; ?>

			  <?php if($readonly): ?> readonly <?php endif; ?>
	><?php echo $value; ?></textarea>
	<?php echo $__env->make(AdminTemplate::getViewPath('form.element.partials.errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>