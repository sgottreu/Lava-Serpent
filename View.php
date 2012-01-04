<?php

class View
{
	protected $view;

	public function __construct($view)
	{
		$this->view = $view;
	}
	
	public function render($data)
	{
		include('views/'.$this->view.'.php');
	}



}