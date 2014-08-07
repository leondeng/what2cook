<?php

/**
 * FridgeItem filter form base class.
 *
 * @package    what2cook
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFridgeItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(),
      'amount'   => new sfWidgetFormFilterInput(),
      'unit'     => new sfWidgetFormChoice(array('choices' => array('' => '', 'of' => 'of', 'grams' => 'grams', 'ml' => 'ml', 'slices' => 'slices'))),
      'useby'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'idFridge' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Fridge'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'amount'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unit'     => new sfValidatorChoice(array('required' => false, 'choices' => array('of' => 'of', 'grams' => 'grams', 'ml' => 'ml', 'slices' => 'slices'))),
      'useby'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'idFridge' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Fridge'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('fridge_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FridgeItem';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'amount'   => 'Number',
      'unit'     => 'Enum',
      'useby'    => 'Date',
      'idFridge' => 'ForeignKey',
    );
  }
}
