<?php

namespace Dominio\Clases;

class Periodo
{

	private $_id;
	
	/**
	 * Fecha sin hora, en cual inicia el periodo
	 */
	private $_fechaInicio;
	
	/**
	 * Fecha sin hora, en cual acaba el periodo
	 */
	private $_fechaFinal;
	
	/**
	 * Breve descripcion acerca del periodo
	 * @var String
	 */
	private $_descripcion;
	
	/**
	 * Atributo de tipo Usuario. Es el usuario propietario del periodo
	 */
	private $_usuario;

	public function __construct($id, $fechaInicio, $fechaFinal, $descripcion)
	{
		$this->_id = $id;
		$this->_fechaInicio= $fechaInicio;
		$this->_fechaFinal = $fechaFinal;
		$this->_descripcion = $descripcion;
	}

	public function getId()
	{
		return $this->_id;
	}
	public function setId($id)
	{
		$this -> _id = $id;
	}
	public function getFechaInicio()
	{
		return $this->_fechaInicio;
	}
	public function getFechaFinal()
	{
		return $this->_fechaFinal;
	}
	public function getDescripcion()
	{
		return $this->_descripcion;
	}
	public function getUsuario()
	{
		return $this->_usuario;
	}
	public function setUsuario(Usuario $usuario)
	{
		$this->_usuario = $usuario;
	}
}