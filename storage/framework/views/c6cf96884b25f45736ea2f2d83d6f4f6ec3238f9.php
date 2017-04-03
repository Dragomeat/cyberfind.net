<div class="form-group form-element-select <?php echo e($errors->has($name) ? 'has-error' : ''); ?>">
    <label for="<?php echo e($name); ?>" class="control-label">
        <?php echo e($label); ?>


        <?php if($required): ?>
            <span class="form-element-required">*</span>
        <?php endif; ?>
    </label>

    <div>
        <?php echo Form::select($name, $options, $value, $attributes); ?>

    </div>

    <?php echo $__env->make(AdminTemplate::getViewPath('form.element.partials.helptext'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make(AdminTemplate::getViewPath('form.element.partials.errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>