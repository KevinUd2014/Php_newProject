<?php

class QuizModel{

	private $tryAnswer;

	public function __construct(){

	}

	public function checkQuiz($quiz,$answers){//hämta alla från DAL, loopa med foreach från dal, är frågorna samma som answers i samma position.
		
		foreach($quiz->getQuestions() as $question){
			$answer = array_shift($answers);
			$question->setAnswer($answer);

		} 

		return $quiz; 
	}
}