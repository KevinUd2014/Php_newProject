<?php

	session_start();

	require_once('View/QuizView.php');
	require_once('Controller/QuizController.php');
	require_once('Model/QuizModel.php');
	require_once('Model/QuizQuestion.php');
	require_once('Model/CreateQuizModel.php');
	require_once('Model/Quiz.php');
	require_once("View/LayoutView.php");
	require_once("Model/QuizDAL.php");
	require_once("View/CreateAQuizView.php");
	require_once("Controller/CreateQuizController.php");

	class MasterController{
			//CREATE OBJECTS OF THE VIEWS  
		public function startMyApplication(){
		//databasen
			
			//original view
			
			$LayoutView = new LayoutView();
			$viewToRender = null;
			

			
			if(isset($_GET["Quiz"]))//delar upp min applikation i en register och en login väg! ||isset($_GET["MusicQuiz"]) || isset($_GET["ClassicMusicQuiz"])
			{

				$quizController = new QuizController($LayoutView);
				$quizController->DidUserQuiz();

				$viewToRender = $quizController->getView();

			}
			else if (isset($_GET["CreateQuiz"]))
			{
				$createQuiz = new CreateAQuizView();

				$CreateQuizController = new CreateQuizController();

				$viewToRender = $CreateQuizController->getView();
			}
			else
			{
				$qdal = new QuizDAL();
				$LayoutView->setQuizes($qdal->getQuizes());
			}

			$LayoutView->render(null, $viewToRender); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false
			  
		}
	}