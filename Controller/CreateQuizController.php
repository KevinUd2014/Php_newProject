<?php

class CreateQuizController{
	private $view;

	public function __construct()
	{

		$this->view = new CreateAQuizView();
		$qdal = new QuizDAL();
		$model = new CreateQuizModel($qdal);
		$data = null;
		if ($this->view->checkIfPosted($data))
		{
			$model->CreateAQuiz($data);
		}

	}

	public function getView()
	{

		return $this->view;

	}
	

}