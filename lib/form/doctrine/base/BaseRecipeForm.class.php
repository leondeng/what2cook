<?php

/**
 * Recipe form base class.
 *
 * @method Recipe getObject() Returns the current form's model object
 *
 * @package    what2cook
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRecipeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'preptime'   => new sfWidgetFormInputText(),
      'cooktime'   => new sfWidgetFormInputText(),
      'readytime'  => new sfWidgetFormInputText(),
      'directions' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorPass(array('required' => false)),
      'preptime'   => new sfValidatorInteger(array('required' => false)),
      'cooktime'   => new sfValidatorInteger(array('required' => false)),
      'readytime'  => new sfValidatorInteger(array('required' => false)),
      'directions' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('recipe[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Recipe';
  }

}
