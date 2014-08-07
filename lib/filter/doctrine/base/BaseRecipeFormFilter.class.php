<?php

/**
 * Recipe filter form base class.
 *
 * @package    what2cook
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRecipeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(),
      'preptime'   => new sfWidgetFormFilterInput(),
      'cooktime'   => new sfWidgetFormFilterInput(),
      'readytime'  => new sfWidgetFormFilterInput(),
      'directions' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'preptime'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cooktime'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'readytime'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'directions' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('recipe_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Recipe';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'preptime'   => 'Number',
      'cooktime'   => 'Number',
      'readytime'  => 'Number',
      'directions' => 'Text',
    );
  }
}
