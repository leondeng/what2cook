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

    $this->widgetSchema->setLabel('fridge', 'Upload Fridge File in CSV Format');
    $this->widgetSchema->setLabel('recipe', 'Upload Recipes in JSON Format');
    
    $this->widgetSchema->setNameFormat('upload[%s]');
  }
}