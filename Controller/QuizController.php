<?php


class QuizController{

	private $quizModel;
	private $quizView;

	private $answers;


	public function __construct(QuizModel $quizModel, QuizView $quizView){
		$this->quizModel = $quizModel;
		$this->quizView = $quizView;
	}
	public function DidUserQuiz(){
		if($this->quizView->didUserPostQuiz())
		{

			try{
				$this->answer = $this->quizView->GetAnswers();

				$this->quizModel->trySumitQuiz($this->answer);
			}
			catch(Exception $e){
				$this->quizView->actionMessages($e->getMessage());
				//echo"$e";
			}
		}
		
		
	}

}