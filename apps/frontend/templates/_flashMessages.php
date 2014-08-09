<?php if ($sf_user->hasFlash('success')): ?>
<div class="flash flash_success">
	<?php echo $sf_user->getFlash('success') ?>
</div>
<?php endif ?>

<?php if ($sf_user->hasFlash('error')): ?>
<div class="flash flash_error">
	<?php echo $sf_user->getFlash('error') ?>
</div>
<?php endif ?>

<?php if ($sf_user->hasFlash('notice')): ?>
<div class=" flash flash_notice">
	<?php echo $sf_user->getFlash('notice') ?>
</div>
<?php endif ?>
