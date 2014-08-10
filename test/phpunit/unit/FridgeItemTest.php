<?php
require_once dirname(__FILE__) . '/../bootstrap/unit.php';

class unit_FridgeItemTest extends sfPHPUnitBaseTestCase
{
  private static $values = array(
      'bread',
      '10',
      'slices',
      '25/12/2014'
  );
  
  protected function _start() {
    $configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);
    new sfDatabaseManager($configuration);
  }

  public function testInitlization() {
    $item = new FridgeItem();
    $item->initialize(self::$values);
    
    $this->assertEquals(self::$values[0], $item->getName());
    $this->assertEquals(self::$values[1], $item->getAmount());
    $this->assertEquals(self::$values[2], $item->getUnit());
    $this->assertEquals(self::$values[3], $item->getUseBy());
  }

  public function testExpiration() {
    $item = new FridgeItem();
    $item->initialize(self::$values);
    
    $item->setUseBy(date('d/m/Y', strtotime('yesterday')));
    $this->assertTrue($item->isExpired());
    
    $item->setUseBy(date('d/m/Y', strtotime('tomorrow')));
    $this->assertFalse($item->isExpired());
  }

}