<?php
require_once dirname(__FILE__) . '/../bootstrap/unit.php';

class unit_FridgeTest extends sfPHPUnitBaseTestCase
{
  private static $items = array(
      array(
          'bread',
          '10',
          'slices',
          '25/12/2014'
      ),
      array(
          'cheese',
          '10',
          'slices',
          '25/12/2014'
      )
  );
  private static $recipe = array(
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

  public function testLoadItems() {
    $fridge = new Fridge();
    $fridge->loadItems(self::$items);

    $this->assertEquals(count(self::$items), count($fridge->getItems()));

    foreach ($fridge->getItems() as $item) {
      $this->assertTrue($item instanceof FridgeItem);
    }
  }

  public function testLoadItemsFromFile() {
    $fridge = new Fridge();
    $fridge->loadItemsFromFile(sprintf('%s/inputFiles/fridge_items.csv', sfConfig::get('sf_data_dir')));

    $this->assertEquals(5, count($fridge->getItems()));
  }

  public function testFindIngredient() {
    $fridge = new Fridge();
    $fridge->loadItems(self::$items);

    $recipe = new Recipe();
    $recipe->setName(self::$recipe['name']);
    $recipe->loadIngredients(self::$recipe['ingredients']);

    // found
    foreach ($recipe->getIngredients() as $ingredient) {
      $this->assertEquals('25/12/2014', $fridge->findIngredient($ingredient->getName(), $ingredient->getAmount(), $ingredient->getUnit()));
    }

    // not found
    $this->assertFalse($fridge->findIngredient('butter', 2, 'slices'));

    // not enough
    $this->assertFalse($fridge->findIngredient('bread', 11, 'slices'));

    // unit mismatch
    $this->assertFalse($fridge->findIngredient('bread', 2, 'grams'));

    // expired
    $items = $fridge->getItems();
    $items[0]->setUseBy(date('d/m/Y', strtotime('yesterday')));
    $this->assertFalse($fridge->findIngredient('bread', 2, 'slices'));
  }

  public function testSearchRecipe() {
    $fridge = new Fridge();
    $fridge->loadItemsFromFile(sprintf('%s/inputFiles/fridge_items.csv', sfConfig::get('sf_data_dir')));

    $recipes = array();
    $recipes = $this->loadRecipesFromFile(sprintf('%s/inputFiles/recipes.json', sfConfig::get('sf_data_dir')));
    $this->assertEquals(2, count($recipes));

    $found = $fridge->searchRecipe($recipes);

    $this->assertTrue($found instanceof Recipe);
    $this->assertEquals('grilled cheese on toast', $found->getName());
    $this->assertEquals(2, count($found->getIngredients()));
  }

  protected function loadRecipesFromFile($filename) {
    $recipes = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
      $content = fread($handle, filesize($filename));
      fclose($handle);

      $values = json_decode($content, TRUE);

      if (!is_array($values)) throw new sfException('Invalid json values parsed!');

      foreach ($values as $value) {
        $recipe = new Recipe();
        $recipe->setName($value['name']);
        $recipe->loadIngredients($value['ingredients']);

        $recipes[] = $recipe;
      }

      return $recipes;
    }
  }

}