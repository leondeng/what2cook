<?php echo form_tag(url_for('@homepage'), 'multipart=true'); ?>
<div class="box">
  <div class="title">
    <h2>Please load fridge and submit recipes:</h2>
  </div>
  <div class="inner">
    <?php echo $form; ?>
  </div>
  <div class="buttons">
    <div class="button_item">
      <input class="button" value="Search Now!" type="submit" />
    </div>
  </div>
</div>
</form>
