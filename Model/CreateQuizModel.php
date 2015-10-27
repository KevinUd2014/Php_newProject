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

		if(strip_tags($title) != $title || strip_tags($description) != $description){
			throw new Exception("No tags in my quiz");
		}
		$questioncount = 0; 
 
		foreach ($data["questions"] as $q)
		{
			if(strip_tags($q["title"]) != $q["title"]){
				throw new Exception("No tags in questions in my quiz");
			} 

			if (!isset($q["options"]))
				continue;

			$options = array();
			$correcModifier = 0;
			$currentOption = 1;

			foreach ($q["options"] as $o)//För varje option så kör den detta
			{
				if (trim($o) == "")//denna kollar om nu options är tom så kör den denna modifikation
				{
					if ($q["correct"] > $currentOption)// om den optionen man är på är mindre än den option som är rätt så plussar den på correct svaret
						$correcModifier++;
					$currentOption++;//och plussar på den man är på så man kan kolla nästa
					continue;
				}

				if(strip_tags($o) != $o)
					throw new Exception("No tags in option in my quiz");

				$currentOption++;
				array_push($options,$o);//lägger in allt i arrayen
			}

			if (count($options) == 0)
				continue;

			$correct = min($q["correct"] - 1 - $correcModifier,count($options) - 1);//denna modifiererar den tar det lägsta i options och sätter om det rätta till den nya anpassade listan (Fick hjälp med denna!)

			$questioncount++;
			$quiz->addQuestion(new QuizQuestion($q["title"], $options, $correct));
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