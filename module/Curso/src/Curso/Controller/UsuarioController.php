<?php
namespace Curso\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class UsuarioController extends AbstractActionController
{
	public function indexAction()
	    {
	    	//Sellama al servicio
	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
	      	$params=$this->params()->fromRoute();
	      	/////////////////////
	      
	    	$usuario->loadById($params['id']);
	    	//print_r($usuario);
	    	$data['hola']=$usuario->getPersona();
	    	$data['all']=$usuario->loadAll();
	        return new ViewModel($data);
	    }
	    
	    public function AddAction(){
	    	
	    }
	    
	    public function DeleteAction(){
	    	
	    }
	    
	    public function EditAction(){
	    	
	    }
	    
	
}