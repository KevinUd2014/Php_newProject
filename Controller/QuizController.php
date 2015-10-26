<?php


class QuizController{

	private $quizModel;
	private $quizView;
	private $quiz;
	private $answers;
	private $quizDAL;

	private $quizname;

	public function __construct(LayoutView $layoutView){ 

		$this->quizDAL = new QuizDAL();
		$this->quizModel = new QuizModel($this->quizDAL);
		$this->quizView = new QuizView();


		if ($this->quizView->GetQuizRandom()) 
		{
			$quizes = $this->quizDAL->getQuizes();
			$this->quizname = basename(str_replace(".bin","",$quizes[rand(0,count($quizes)-1)]));
		}
		else
			$this->quizname = $this->quizView->GetQuiz();//här hade jag en $_GET["Quiz"] istället för $this->quizView->GetQuiz()

		$quizfile = "Model/quizes/" . $this->quizname . ".bin";

		$this->quiz = $this->quizDAL->getQuestions($quizfile);

		$this->quizView->setQuizList($this->quizname,$this->quiz);
	}

	public function getView()//hämtar min view 
	{
		return $this->quizView;
	}

	public function DidUserQuiz(){//kollar om användaren har startat ett quiz

		if($this->quizView->didUserPostQuiz())
		{
			try{
				$this->answer = $this->quizView->GetAnswers();
				$correctedQuiz = $this->quizModel->checkQuiz($this->quiz,$this->answer);
			}
			catch(Exception $e){
				$this->quizView->actionMessages($e->getMessage());
			}
		}
		
		
	}

}