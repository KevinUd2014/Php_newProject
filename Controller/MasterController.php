<?php

	session_start();

	require_once('View/QuizView.php');
	require_once('Controller/QuizController.php');
	require_once('Model/QuizModel.php');
	require_once('Model/QuizQuestion.php');
	require_once("View/LayoutView.php");
	require_once("Model/QuizDAL.php");

	class MasterController{
			//CREATE OBJECTS OF THE VIEWS  
		public function startMyApplication(){
		//databasen
			
			//original view
			
			$LayoutView = new LayoutView();
			$viewToRender = null;
			

			
			if(isset($_GET["Quiz"]) ||isset($_GET["MusicQuiz"]) || isset($_GET["ClassicMusicQuiz"]))//delar upp min applikation i en register och en login väg!
			{

				$quizController = new QuizController($LayoutView);
				$quizController->DidUserQuiz();

				$viewToRender = $quizController->getView();

			}

			  $LayoutView->render(null, $viewToRender); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false
			  
		}
	}