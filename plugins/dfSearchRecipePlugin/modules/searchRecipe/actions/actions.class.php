<?php

require_once dirname(__FILE__).'/../lib/BasesearchRecipeActions.class.php';

/**
 * searchRecipe actions.
 *
 * @package    dfSearchRecipePlugin
 * @subpackage searchRecipe
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class searchRecipeActions extends BasesearchRecipeActions
{
  public function executeIndex(sfWebRequest $request) {
    $this->getResponse()->setTitle('HomePage');
    $this->form = new dfSearchRecipeForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('upload'), $request->getFiles('upload'));
      if ($this->form->isValid()) {
        $fileFridge = $this->form->getValue('fridge');
        $fileRecipe = $this->form->getValue('recipe');

        $fridge = FridgeTable::getInstance()->findAll()->getFirst();
        $fridge->loadItemsFromFile($fileFridge->getTempName());

        $this->found = $fridge->searchRecipe($fileRecipe->getTempName());
      } else {
        $this->getUser()->setFlash('error', 'Invalid or empty file!');
      }
    }

  }
}
