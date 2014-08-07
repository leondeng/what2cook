<?php

/**
 * Ingredient filter form base class.
 *
 * @package    what2cook
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseIngredientFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(),
      'amount'   => new sfWidgetFormFilterInput(),
      'unit'     => new sfWidgetFormChoice(array('choices' => array('' => '', 'of' => 'of', 'grams' => 'grams', 'ml' => 'ml', 'slices' => 'slices'))),
      'idRecipe' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Recipe'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'amount'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unit'     => new sfValidatorChoice(array('required' => false, 'choices' => array('of' => 'of', 'grams' => 'grams', 'ml' => 'ml', 'slices' => 'slices'))),
      'idRecipe' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Recipe'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ingredient_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ingredient';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'amount'   => 'Number',
      'unit'     => 'Enum',
      'idRecipe' => 'ForeignKey',
    );
  }
}
