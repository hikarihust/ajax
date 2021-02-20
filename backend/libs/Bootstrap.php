<?php
class Bootstrap
{

	private $_params;
	private $_controllerObject;

	public function init()
	{
		$this->setParam();

		$controllerName	= ucfirst($this->_params['controller']) . 'Controller';
		$filePath	= MODULE_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
	
		if (file_exists($filePath)) {
			$this->loadExistingController($filePath, $controllerName);
			$this->callMethod();
		} else {
			URL::redirect('backend', 'index', 'notice', array('type' => 'not-url'));
		}
	}

	// CALL METHODE
	private function callMethod()
	{
		$actionName = $this->_params['action'] . 'Action';
		if (method_exists($this->_controllerObject, $actionName) == true) {
			$module		= $this->_params['module'];
			$controller	= $this->_params['controller'];
			$action		= $this->_params['action'];
			$requestURL	= "$module-$controller-$action";

			$userInfo	= Session::get('user');

			//$logged		= ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time());
			$logged		= ($userInfo['login'] == true);

			// MODULE ADMIN
			if ($module == 'backend') {
				$this->_controllerObject->$actionName();
			// MODULE DEFAULT
			};
		} else {
			URL::redirect('frontend', 'index', 'notice', array('type' => 'not-url'));
		}
	}

	// SET PARAMS
	public function setParam()
	{
		$this->_params 					= array_merge($_GET, $_POST);
		$this->_params['module'] 		= isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
		$this->_params['controller'] 	= isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
		$this->_params['action'] 		= isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
	}

	// CALL ACTION LOGIN
	private function callLoginAction($module = 'backend')
	{
		Session::delete('user');
		require_once(MODULE_PATH . $module . DS . 'controllers' . DS . 'IndexController.php');
		$indexController = new IndexController($this->_params);
		$indexController->loginAction();
	}

	// LOAD EXISTING CONTROLLER
	private function loadExistingController($filePath, $controllerName)
	{
		require_once $filePath;
		$this->_controllerObject = new $controllerName($this->_params);
	}

	// ERROR CONTROLLER
	public function _error()
	{
		require_once MODULE_PATH . 'default' . DS . 'controllers' . DS . 'ErrorController.php';
		$this->_controllerObject = new ErrorController();
		$this->_controllerObject->setView('default');
		$this->_controllerObject->indexAction();
	}
}
