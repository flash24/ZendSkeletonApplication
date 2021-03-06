<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
	
	public function holaAction()
	{
		
		
		
		
		$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
		
		//$usuario->testDB();
		//$usuario= new UsuarioService();
// 		$usuario->setNombre('cesar arturo');
// 		$usuario->setApellidoPaterno('ciau');
// 		$usuario->setApellidoMaterno('mendoza');
		//echo get_class($usuario);
		$params=$this->params()->fromRoute();
		//print_r($params);
		
		$usuario->loadById($params['id']);
		
		$parametros['nombre']= 'Cesar Ciau';
		$parametros['objeto']=$usuario;
	    return new ViewModel($parametros);
	}
}
