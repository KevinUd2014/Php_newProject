<?php

	session_start();
	require_once('View/QuizView.php');
	require_once('Controller/QuizController.php');
	require_once('Model/QuizModel.php');
	require_once('Model/QuizQuestions.php');
	require_once('Model/QuizSetupModel.php');
	require_once("View/LayoutView.php");

	class MasterController{
			//CREATE OBJECTS OF THE VIEWS  
		public function startMyApplication(){
		//databasen
			
			//original view
			$quizView = new QuizView();//
			
			$quizModel = new QuizModel();
			$LayoutView = new LayoutView();

			$quizController = new QuizController($quizModel, $quizView);
			
			
			if(isset($_GET["Play"]))//delar upp min applikation i en register och en login väg!
			{
				$quizQuestions = new QuizQuestions();
				$quizSetupModel = new QuizSetupModel($quizQuestions);

				/*if(isset($_SESSION["Redirect"]) && $_SESSION["Redirect"] == true){//redirekterar spelaren till en resultatsida!
					//$Result = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
				 	header("Location ?Result");//header("Location:$Result");
				 }*/
			}
			else
		    {
			}
			  
			$LayoutView->render($quizModel->checkQuizSession(), $quizView); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false
		}
	}