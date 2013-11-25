<?php

namespace Curso\Service;

use Application\Service\UsuarioInterface;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\Db\Adapter\Adapter;
use Zend\Db\RowGateway\RowGateway;

class UsuarioService implements UsuarioInterface, ServiceManagerAwareInterface {
	protected $serviceLocator;
	protected $nombre;
	protected $apellidoPaterno;
	protected $apellidoMaterno;
	protected $persona;
	public function setServiceManager(ServiceManager $serviceManager) {
		$this->sm = $serviceManager;
	}
	public function getServiceManager() {
		return $this->sm;
	}
	public function testDB() {
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		$result = $adapter->query ( 'SELECT * FROM `user` WHERE `user_id` = ?', array (
				1 
		) );
		
		echo get_class ( $result ) . '<br/>';
		
		$data = $result->current ();
		print_r ( $data );
	}
	function loadById($user_id) {
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		$result = $adapter->query ( 'SELECT * FROM `user` WHERE `user_id` = ?', array (
				$user_id 
		) );
		$data = $result->current();
		return $data;
// 		if ($data !== null) {
// 			$this->hydrator ( $data );
// 			return true;
// 		}
// 		return false;
	}
	function hydrator($data) {
// 		$this->setNombre ( $data->nombre );
// 		$this->setApellidoPaterno ( $data->apellido_paterno );
// 		$this->setApellidoMaterno ( $data->apellido_materno );
	}
	function loadAll() {
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		$result = $adapter->query ( 'SELECT * FROM `user`', Adapter::QUERY_MODE_EXECUTE );
		
		$data = $result->toArray ();
		return $data;
	}
	function deleteById($user_id) {
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		// query the database
		$resultSet = $adapter->query ( 'SELECT * FROM `user` WHERE `user_id` = ?', array (
				$user_id 
		) );
		
		// get array of data
		$rowData = $resultSet->current ()->getArrayCopy ();
		
		// row gateway
		$rowGateway = new RowGateway ('user_id', 'user', $adapter );
		$rowGateway->populate ( $rowData,true );
		

		
		// or delete this row:
		return $rowGateway->delete ();
	}
	
	function editById($user_id,$data){
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		// query the database
		$resultSet = $adapter->query ( 'SELECT * FROM `user` WHERE `user_id` = ?', array (
				$user_id
		) );
		
		// get array of data
		$rowData = $resultSet->current ()->getArrayCopy ();
		
		// row gateway
		$rowGateway = new RowGateway ('user_id', 'user', $adapter );
		$rowGateway->populate ( $rowData,true );
		$rowGateway->nombre = $data['nombre'];
		$rowGateway->apellido_materno =$data['apellido_materno'];
		$rowGateway->apellido_paterno = $data['apellido_paterno'];
		$rowGateway->save();
		
		
		
	}
	public function getNombre() {
		return $this->nombre . ' ' . $this->apellidoPaterno . '' . $this->apellidoMaterno;
	}
	public function getApellidoPaterno() {
		return $this->apellidoPaterno;
	}
	public function getApellidoMaterno() {
		return $this->apellidoMaterno;
	}
	public function getPersona() {
		$this->persona = $this->nombre . ' ' . $this->apellidoPaterno . ' ' . $this->apellidoMaterno;
		
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