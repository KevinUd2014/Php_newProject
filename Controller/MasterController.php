<?php

	session_start();

	require_once('View/QuizView.php');
	require_once('Controller/QuizController.php');
	require_once('Model/QuizModel.php');
	require_once('Model/QuizQuestion.php');
	require_once('Model/QuizSetupModel.php');
	require_once("View/LayoutView.php");
	require_once("View/ResultOfGame.php");
	require_once("Model/QuizDAL.php");

	class MasterController{
			//CREATE OBJECTS OF THE VIEWS  
		public function startMyApplication(){
		//databasen
			
			//original view
			$quizView = new QuizView();//
			
			$resultView = new ResultOfGame();

			$quizModel = new QuizModel($resultView);
			
			$LayoutView = new LayoutView();
			

			$quizController = new QuizController($quizModel, $quizView);

			$quizDAL = new QuizDAL();
			
			if(isset($_GET["Quiz"]) ||isset($_GET["MusicQuiz"]) || isset($_GET["ClassicMusicQuiz"]))//delar upp min applikation i en register och en login väg!
			{
				$quizQuestions = $quizDAL->getQuestions();

			

				/*foreach($quizQuestions as $question)
				{
					echo $question->getAnswer();
					compare to arrayofanswers that the view returns
				}*/



				$quizView->setQuizList($quizQuestions);
			}
			/*else if(isset($_GET["QuizResultPage"]))
		    {
		    	$quizModel->trySumitQuiz();
			}*/
			$quizController->DidUserQuiz();
			
			  
			$LayoutView->render($quizModel->checkQuizSession(), $quizView); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false
		}
	}