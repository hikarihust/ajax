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

	public function changeAjaxAction(){
		$params['value'] = $_GET['value'];
		$params['id']	= $_GET['id'];
		$result = $this->_model->changeAjax($params,$_GET['type']);
		echo json_encode($result);
	}

	public function changeStatusAction(){
		$params['id'] 		= $_GET['id'];
		$params['type'] 	= $_GET['status'];
		$result = $this->_model->changeAjax($params,'changeStatus');
		echo json_encode($result);
	}

}
