<?php if( ! empty($value)): ?>
	<a href="<?php echo e($value); ?>" data-toggle="lightbox">
		<img class="thumbnail" src="<?php echo e($value); ?>" width="<?php echo e($imageWidth); ?>">
	</a>
<?php endif; ?>
<?php echo $append; ?>