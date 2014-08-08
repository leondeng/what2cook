<?php
class dfSearchRecipeForm extends BaseForm
{
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

    $this->widgetSchema->setLabel('fridge', 'Fridge csv File: ');
    $this->widgetSchema->setLabel('recipe', 'Recipes json File: ');
    
    $this->widgetSchema->setNameFormat('upload[%s]');
  }
}