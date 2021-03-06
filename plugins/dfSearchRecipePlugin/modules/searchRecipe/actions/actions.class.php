<?php

require_once dirname(__FILE__).'/../lib/BasesearchRecipeActions.class.php';

/**
 * searchRecipe actions.
 *
 * @package    dfSearchRecipePlugin
 * @subpackage searchRecipe
 * @author     Fan Deng
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class searchRecipeActions extends BasesearchRecipeActions
{
  /**
	* searchRecipeActions::executeIndex()
	*
	* 
	*
	* @param sfWebRequest $request
	* @author Fan Deng
	*/
  public function executeIndex(sfWebRequest $request) {
    $this->getResponse()->setTitle('HomePage');

    $this->form = new dfSearchRecipeForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('upload'), $request->getFiles('upload'));

      if ($this->form->isValid()) {
        if(!$this->found = $this->form->searchRecipe()) {
          $this->getUser()->setFlash('notice', 'So sorry, no suitable recipe found.');
        } else {
          $this->getUser()->setFlash('success', 'Congs! Recipe found!');
        }
      } else {
        $this->getUser()->setFlash('error', 'Invalid or empty file(s)!');
      }
    }

  }
}
