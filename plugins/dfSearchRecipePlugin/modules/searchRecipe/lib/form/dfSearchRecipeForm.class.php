<?php
class dfSearchRecipeForm extends BaseForm
{
  private $fridge = null;
  private $recipes = array();

  public function configure() {
    $this->setWidgets(array(
      'fridge' => new sfWidgetFormInputFile(),
      'recipe' => new sfWidgetFormInputFile(),
    ));

    $this->setValidators(array(
      'fridge' => new sfValidatorFile(array(
        //'mime_types' => array('text/comma-separated-values'),
      )),
      'recipe' => new sfValidatorFile(array(
        //'mime_types' => array('text/plain'),
      )),
    ));

    $this->widgetSchema->setLabel('fridge', 'Fridge Items (csv): ');
    $this->widgetSchema->setLabel('recipe', 'Recipes (json): ');

    $this->mergePostValidator(new sfValidatorCallback(array(
      'callback' => array($this, 'validateFridgeItems'),
    )));

    $this->mergePostValidator(new sfValidatorCallback(array(
        'callback' => array($this, 'validateRecipe'),
    )));

    $this->widgetSchema->setNameFormat('upload[%s]');
  }

  public function validateFridgeItems($validator, $values) {
    $fileFridgeItems = $values['fridge'];

    if (empty($fileFridgeItems)) return $values;

    $this->fridge = new Fridge();
    try {
      $this->fridge->loadItemsFromFile($fileFridgeItems->getTempName());
    } catch (sfException $e) {
      $error = new sfValidatorError($validator, 'Invalid file, please check format.');
      throw new sfValidatorErrorSchema($validator, array('fridge' => $error));
    }

    return $values;
  }

  public function validateRecipe($validator, $values) {
    $fileRecipes = $values['recipe'];

    if (empty($fileRecipes)) return $values;

    try {
      $this->loadRecipesFromFile($fileRecipes->getTempName());
    } catch (sfException $e) {
      $error = new sfValidatorError($validator, 'Invalid file, please check format.');
      throw new sfValidatorErrorSchema($validator, array('recipe' => $error));
    }

    return $values;
  }

  protected function loadRecipesFromFile($filename) {
    if (($handle = fopen($filename, 'r')) !== FALSE) {
      $content = fread($handle, filesize($filename));
      fclose($handle);

      $values = json_decode($content, TRUE);

      if (!is_array($values))
        throw new sfException('Invalid json values parsed!');

      foreach ($values as $value) {
        $recipe = new Recipe();
        $recipe->setName($value['name']);
        $recipe->loadIngredients($value['ingredients']);

        $this->recipes[] = $recipe;
      }
    }
  }

  public function searchRecipe() {
    return $this->fridge->searchRecipe($this->recipes);
  }
}