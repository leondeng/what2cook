<?php
require_once dirname(__FILE__) . '/../bootstrap/unit.php';

class unit_RecipeTest extends sfPHPUnitBaseTestCase
{
  private static $values = array(
      'name' => 'grilled cheese on toast',
      'ingredients' => array(
          array(
              'item' => 'bread',
              'amount' => '2',
              'unit' => 'slices'
          ),
          array(
              'item' => 'cheese',
              'amount' => '2',
              'unit' => 'slices'
          )
      )
  );

  protected function _start() {
    $configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);
    new sfDatabaseManager($configuration);
  }

  public function testLoadIngredients() {
    $recipe = new Recipe();
    $recipe->setName(self::$values['name']);
    $recipe->loadIngredients(self::$values['ingredients']);
    
    $this->assertEquals(self::$values['name'], $recipe->getName());
    
    $this->assertEquals(count(self::$values['ingredients']), count($recipe->getIngredients()));
    
    foreach ($recipe->getIngredients() as $ingredient) {
      $this->assertEquals('Ingredient', get_class($ingredient));
    }
  }

}