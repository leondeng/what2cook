<?php

/**
 * Ingredient
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    what2cook
 * @subpackage model
 * @author     Fan Deng
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Ingredient extends BaseIngredient
{
  /**
	* Ingredient::initialize()
	*
	* init from array values
	*
	* @param unknown $values
	* @throws sfException
	* @author Fan Deng
	*/
  public function initialize(array $values) {
    if (count($values) != 3 || count(array_diff(array_keys($values), array('item', 'amount', 'unit'))))
      throw new sfException('Invalid init values!');

    $this->setName($values['item']);
    $this->setAmount($values['amount']);
    $this->setUnit($values['unit']);
  }
}
