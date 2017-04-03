<div class="form-group form-element-checkbox <?php echo e($errors->has($name) ? 'has-error' : ''); ?>">
	<div class="checkbox">
		<label>
			<input <?php echo $attributes; ?> type="checkbox" value="1" <?php echo $value ? 'checked="checked"' : ''; ?> />

			<?php echo e($label); ?>

		</label>

		<?php echo $__env->make(AdminTemplate::getViewPath('form.element.partials.helptext'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<?php echo $__env->make(AdminTemplate::getViewPath('form.element.partials.errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>