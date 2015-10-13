<?php
	class QuizQuestions{

		private $question = "1+1=2?";
		private $options = array("1","true","3","4");
		private $correctAnswer = "true";

		private function correctAnswer(){
			//Create an array of Correct answers
			$correctAnswerArray = array();
			foreach($questionsArray as  $question){
			    $correctAnswerArray[$question['questionid']] = $question['answer'];
			}
		}
		//Build the questions array from query result
		private function questionBuild(){
			$questions = array();
			foreach($questionsArray as $question) {
			    $questions[$question['questionid']] = $question['name'];
			}
		}
		//Build the choices array from query result
		private function choicesBuild(){
			$choices = array();
			foreach ($questionsArray as $row) {
		    	$choices[$row['questionid']] = array($row['choice1'], $row['choice2'], $row['choice3'], $row['answer']);
		    }
		}
	}