<?php


class QuizController{

	private $quizModel;
	private $quizView;
	public function __construct(QuizModel $quizModel, QuizView $quizView){
		$this->quizModel = $quizModel;
		$this->quizView = $quizView;
	}
	public function QuizUser(){

	
	}

}