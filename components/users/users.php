<?php
defined('_MEXEC') or die ('Restricted Access');

import('core.application.component.controller');
class ControllerUsers extends Controller{
	
	function __construct(){
		parent::display();
		return;
		$app = Core::getApplication();
		$this->user = core::getUser();
		$options = $app->getOptions();
		$com = $options->com;
		$priv=$this->user->hasPriv($com,null,true);
		if($priv){
			$this->view = $this->getView();
			//$this->view->privs=array();
			$this->view->priv=$priv;
			foreach($priv as $p){
				$str = substr($p,strlen($com)+1);
				$this->view->privs[$str] = true;
				//$this->view->priv_delete=$this->user->hasPriv('messages.delete');
			}
			//var_dump($this->view->privs);
			parent::display();
		}else{
			Controller::$buffer = '<h3>' . Localize::_('no_privileges_contact_admin') . '</h3>';
		}
	}
	
}




