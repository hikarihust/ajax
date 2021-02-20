<?php


class IndexController extends BackendController
{
	private $_setController = 'index';

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
	}

	public function indexAction(){
		$this->_view->items				= $this->_model->getItems();
		$this->_view->arrCategoryName	= $this->_model->getCategoryArr();
		$this->_view->render($this->_setController . '/index');
	}

}
