<?php $recipe = $sf_data->getRaw('recipe'); ?>

<div class="recipe">
  <div class="recipe_title">
    <h2>Found <label class="recipe_name"><?php echo $recipe->getName(); ?></label></h2>
  </div>
  <!-- Recipe Images -->
  <!-- Preptime Cooktime Readytime -->
  <div class="ingredients_list">
    <h4>Ingredients</h4>
    <?php foreach ($recipe->getIngredients() as $ingredient) { ?>
      <?php include_partial('ingredient', array('ingredient' => $ingredient));?>
    <?php } ?>
  </div>
  <!-- Directions -->
  <!-- Links -->
</div>
