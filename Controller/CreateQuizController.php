<?php

class CreateQuizController{
	private $view;

	public function __construct()
	{

		$this->view = new CreateAQuizView();

	}

	public function getView()
	{

		return $this->view;

	}
	

}