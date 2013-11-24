<?php
namespace Curso\Service;

use Application\Service\UsuarioInterface;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;


class UsuarioService implements UsuarioInterface,ServiceManagerAwareInterface{
	
	protected $serviceLocator;
	protected $nombre;
	protected $apellidoPaterno;
	protected $apellidoMaterno;
	protected $persona;
	
	public function setServiceManager(ServiceManager $serviceManager){
		$this->sm = $serviceManager;
	}
	
	public function getServiceManager(){
		return $this->sm;
	}
	
	public function testDB(){
		$adapter=$this->getServiceManager()->get('Zend\Db\Adapter\Adapter');
		$result=$adapter->query('SELECT * FROM `user` WHERE `user_id` = ?', array(1));
		
		echo get_class($result).'<br/>';
		
		$data=$result->current();
		print_r($data);
	}
	
	
	
	
	
	
	
	public function getNombre() {
		return $this->nombre.' '.$this->apellidoPaterno.''.$this->apellidoMaterno;
	}

	public function getApellidoPaterno() {
		return $this->apellidoPaterno;
	}

	public function getApellidoMaterno() {
		return $this->apellidoMaterno;
	}
	
	public function getPersona() {
		$this->persona=$this->nombre.' '.$this->apellidoPaterno.' '.$this->apellidoMaterno;
		
		return $this->persona;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function setApellidoPaterno($apellidoPaterno) {
		$this->apellidoPaterno = $apellidoPaterno;
	}

	public function setApellidoMaterno($apellidoMaterno) {
		$this->apellidoMaterno = $apellidoMaterno;
	}

	
	
}