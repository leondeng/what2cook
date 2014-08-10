<?php
require_once dirname(__FILE__) . '/../bootstrap/unit.php';

class unit_IngredientTest extends sfPHPUnitBaseTestCase
{
  private static $values = array(
      'item' => 'bread',
      'amount' => '2',
      'unit' => 'slices'
  );

  protected function _start() {
    $configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);
    new sfDatabaseManager($configuration);
  }

  public function testInitlization() {
    $ingredient = new Ingredient();
    $ingredient->initialize(self::$values);
    
    $this->assertEquals(self::$values['item'], $ingredient->getName());
    $this->assertEquals(self::$values['amount'], $ingredient->getAmount());
    $this->assertEquals(self::$values['unit'], $ingredient->getUnit());
  }

}