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
			try{
				$model->CreateAQuiz($data);
			}
			catch(Exception $e)
			{
				$this->view->actionMessages($e->getMessage());
			}
		}
	}

	public function getView()
	{

		return $this->view;

	}
	

}