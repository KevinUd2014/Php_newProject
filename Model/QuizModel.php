<?php

class QuizModel{

	private $tryAnswer;

	public function __construct($resultView){
		$this->resultView = $resultView;
	}

	public function trySumitQuiz($answer){ //denna anropas t.ex. i index!//
		$this->tryAnswer = $answer;
		if($this->tryAnswer === ""){
			throw new EXCEPTION ("You will answer...");
			//echo "cannot continue!";
		}
		
		echo "hej";
	}
	public function checkQuizSession(){

	}
}