<?php

	session_start();

	require_once('View/QuizView.php');
	require_once('Controller/QuizController.php');
	require_once('Model/QuizModel.php');
	require_once('Model/QuizQuestion.php');
	require_once('Model/QuizSetupModel.php');
	require_once("View/LayoutView.php");
	require_once("Model/QuizDAL.php");

	class MasterController{
			//CREATE OBJECTS OF THE VIEWS  
		public function startMyApplication(){
		//databasen
			
			//original view
			$quizView = new QuizView();//
			
			$quizModel = new QuizModel();
			$LayoutView = new LayoutView();

			$quizController = new QuizController($quizModel, $quizView);
			$quizDAL = new QuizDAL();
			
			if(isset($_GET["Quiz"]))//delar upp min applikation i en register och en login väg!
			{

				$quizQuestions = $quizDAL->getQuestions();//array(new QuizQuestion("2+2=4",array(3,7,"true","false","get"),2),new QuizQuestion("Vem får inte följa med in på systemet?",array("hunden","katten","glassen","ingen"),3));

				$quizView->setQuizList($quizQuestions);


				//$quizSetupModel = new QuizSetupModel($quizQuestions);

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