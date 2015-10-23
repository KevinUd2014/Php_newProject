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


		if ($_GET["Quiz"] == "random")
		{
			$quizes = $this->quizDAL->getQuizes();
			$this->quizname = basename(str_replace(".bin","",$quizes[rand(0,count($quizes)-1)]));
		}
		else
			$this->quizname = $_GET["Quiz"];

		$quizfile = "Model/quizes/" . $this->quizname . ".bin";

		$this->quiz = $this->quizDAL->getQuestions($quizfile);

		$this->quizView->setQuizList($this->quizname,$this->quiz);
	}

	public function getView()
	{
		return $this->quizView;
	}

	public function DidUserQuiz(){

		if($this->quizView->didUserPostQuiz())
		{
			try{
				$this->answer = $this->quizView->GetAnswers();
				$correctedQuiz = $this->quizModel->checkQuiz($this->quiz,$this->answer);

				/*
				$i = 1;
				foreach ($correctedQuiz as $cq)
				{
					echo "<br>Fråga nummer $i är ".($cq->isCorrect() ? "Rätt!" : "Fel!")." (you selected ".$cq->getAnswer().")";
					$i++;
				}
				*/
				//$this->quizModel->trySumitQuiz($this->answer);
			}
			catch(Exception $e){
				$this->quizView->actionMessages($e->getMessage());
			}
		}
		
		
	}

}