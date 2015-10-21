<?php


class QuizController{

	private $quizModel;
	private $quizView;
	private $quiz;
	private $answers;
	private $quizDAL;

	private $quizname;

	private $randomQuizes = array("quiz","music","classicmusic");

	public function __construct(LayoutView $layoutView){

		$this->quizDAL = new QuizDAL();
		$this->quizModel = new QuizModel($this->quizDAL);
		$this->quizView = new QuizView();


		if ($_GET["Quiz"] == "random")
		{
			$this->quizname = $this->randomQuizes[rand(0,count($this->randomQuizes)-1)];
		}
		else if($_GET["PlayerCreatedQuiz"]){
			//TODO: Här ska man sätta om nu användaren trycker på create a quiz så ska något göras!
		}
		else
			$this->quizname = $_GET["Quiz"];

		$quizfile = "Model/Json/" . $this->quizname . ".json";

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