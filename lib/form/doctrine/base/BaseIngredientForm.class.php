<?php

/**
 * Ingredient form base class.
 *
 * @method Ingredient getObject() Returns the current form's model object
 *
 * @package    what2cook
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIngredientForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'amount'   => new sfWidgetFormInputText(),
      'unit'     => new sfWidgetFormChoice(array('choices' => array('of' => 'of', 'grams' => 'grams', 'ml' => 'ml', 'slices' => 'slices'))),
      'idRecipe' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Recipe'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'     => new sfValidatorPass(array('required' => false)),
      'amount'   => new sfValidatorInteger(array('required' => false)),
      'unit'     => new sfValidatorChoice(array('choices' => array(0 => 'of', 1 => 'grams', 2 => 'ml', 3 => 'slices'), 'required' => false)),
      'idRecipe' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Recipe'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ingredient[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ingredient';
  }

}
