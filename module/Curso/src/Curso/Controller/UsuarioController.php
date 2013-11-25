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
	       	
	    	$data['all']=$usuario->loadAll();
	        return new ViewModel($data);
	    }
	    
	    public function AddAction(){

	    	$prg = $this->prg('/usuario/index', true);
	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
	    	if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
	    		$datos=array();
	    		$datos['user_id']="";
	    		$datos['nombre']=$this->params()->fromPost('nombre');
	    		$datos['apellido_paterno']=$this->params()->fromPost('apellido_paterno');
	    		$datos['apellido_materno']=$this->params()->fromPost('apellido_materno');
	    		$usuario->add($datos);
	    		
	    		return $prg;
	    	}
	    
	    	
	    	return new ViewModel();
	    }
	    
	    public function DeleteAction(){
 	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
 	    	$params=$this->params()->fromRoute();
	    
	    	
 	    	$data['delete']=$usuario->deleteById($params['id']);
   //         $data['delete']=$params['id'];
	    	//return new ViewModel($data);


 	    	return $this->redirect()->toRoute('usuario');
 	    	 
	    }
	    
	    public function EditAction(){
	    	$prg = $this->prg('/usuario/index', true);
	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
	    	$params=$this->params()->fromRoute();
	    	$data['datos']=$usuario->loadById($params['id']);
	    	if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
	    		$datos=array();
	    		$datos['nombre']=$this->params()->fromPost('nombre');
	    		$datos['apellido_paterno']=$this->params()->fromPost('apellido_paterno');
	    		$datos['apellido_materno']=$this->params()->fromPost('apellido_materno');
	    		$usuario->editById($this->params()->fromPost('user_id'), $datos);
	    		// returned a response to redirect us
	    		return $prg;
	    	}
            
	    	
	    	return new ViewModel($data);
	    }
	    
	
}