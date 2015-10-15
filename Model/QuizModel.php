<?php

class QuizModel{

	private $tryAnswer;

	public function __construct(){

	}

	// public function trySumitQuiz($answer){ //denna anropas t.ex. i index!//
	// 	$this->tryAnswer = $answer;
	// 	if($this->tryAnswer === ""){
	// 		throw new EXCEPTION ("You will answer...");
	// 		//echo "cannot continue!";
	// 	}
	// 	echo "hej";
	// }
	public function checkQuiz($quiz,$answers){
		//hämta alla från DAL, loopa med foreach från dal, är frågorna samma som answers i samma position.
		foreach($quiz["questions"] as $question){
			$answer = array_shift($answers);
			$question->setAnswer($answer);

		}

		return $quiz;
	}
}