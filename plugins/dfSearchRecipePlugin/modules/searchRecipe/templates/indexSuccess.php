<?php echo form_tag(url_for('@homepage'), 'multipart=true'); ?>
<div class="box">
  <div class="title">
    <h3>Please select files and click 'Search Now!' button.</h3>
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
<?php
if (isset($found)) {
  if ($found) {
    $recipe = $sf_data->getRaw('found');
    include_partial('recipe', array('recipe' => $recipe));
  } else {
?>
  <div class="recipe">
    <div class="recipe_title">
      <h2>So sorry, no suitable recipe found.</h2>
    </div>
  </div>
<?php
  }
}
?>
