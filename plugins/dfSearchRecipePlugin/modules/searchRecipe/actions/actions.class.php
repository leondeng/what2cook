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

        $fridge = new Fridge();
        $fridge->loadItemsFromFile($fileFridge->getTempName());

        if(!$result = $fridge->searchRecipe($fileRecipe->getTempName())) {
          $this->getUser()->setFlash('error', 'Sorry, no suitable recipe found. Go shopping?');
        } else {
          $this->getUser()->setFlash('success', 'Recipe found!');
          echo $result;
        }
      } else {
        $this->getUser()->setFlash('error', 'The files uploaded invalid!');
      }
    }

  }
}
