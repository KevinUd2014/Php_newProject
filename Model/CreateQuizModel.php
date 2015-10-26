<?php


class CreateQuizModel{

	private $quizDAL;
	
	public function __construct(QuizDAL $quizDAL){
		$this->quizDAL = $quizDAL;
	}

	public function CreateAQuiz($data){// denna skapar quizen

		$title = "";// sätter titeln till tom
		$description = "no description";  

		if (isset($data["title"]) && trim($data["title"]) != "")
			$title = $data["title"];
		if (isset($data["description"]) && trim($data["description"]) != "")
			$description  = $data["description"];

		$quiz = new Quiz($title,$description);  

		if ($data["questions"] == null || $title == "")
			throw new Exception("No questions in quiz");

		$questioncount = 0; 

		foreach ($data["questions"] as $q)
		{
			if (!isset($q["options"]))
				continue;
			$questioncount++;
			$quiz->addQuestion(new QuizQuestion($q["title"], $q["options"], $q["correct"] - 1));
		}

		if ($questioncount == 0)
			throw new Exception("No questions in quiz");

		$count = "";
		while(file_exists("Model/quizes/".$quiz->getTitle().$count.".bin"))
		{
			if ($count == "")
				$count = 1;
			else
				$count++;
		}

		$this->quizDAL->writeToBin("Model/quizes/".$quiz->getTitle().$count.".bin",$quiz);

	}
}