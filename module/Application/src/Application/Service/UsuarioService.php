<?php
namespace Application\Service;
class UsuarioService implements UsuarioInterface{
	protected $nombre;
	protected $apellidoPaterno;
	protected $apellidoMaterno;
	protected $persona;
	public function getNombre() {
		return $this->nombre;
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