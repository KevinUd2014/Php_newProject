<?php

class CreateAQuizView{

	private static $Name = "CreateAQuizView::Name";
	private static $Description = "CreateAQuizView::Description";
	private static $Submit = "CreateAQuizView::Submit";

	public function response() {
		$response = "";

		//var_dump(isset($_GET["CreatedQuiz"]));

		if(isset($_GET["CreatedQuiz"])){
			$response .= $this->generateCreateQuizFormHTML();
		}
		$this->checkIfPosted();
		return $response;
	}

	public function checkIfPosted()
	{
		
		if (isset($_POST[self::$Submit]))
		{
			$questions = json_decode($_POST["data"]);

			var_dump($questions);
		}
	}

	private function generateCreateQuizFormHTML() {

		 return '
		<form>
	

			Quiz name: <br>
			<input type="text" id="title" name="'.self::$Name.'">
			<br>
			Description: <br>
			<input type="text" id="description" name="'.self::$Description.'">
			<fieldset id="questionbase">
			  	<legend>Question: </legend>
			  	<input type="text" name="question">

			  	<ol>

			  		<li>
			  			<input type="text">
			  		</li>
			  		<li>
			  			<input type="text">
			  		</li>
			  		<li>
			  			<button class="addoption">Add option</button>
			  		</li>
			  	</ol>
			  	<label>Correct answer: <input type="number" min="1" max="2" class="correct">
			  	<button class="remove">Remove</button>
			</fieldset>
			<div id="questionlist">

			</div>

			<button id="addquestion">Add question</button>
				<br>
				<br>
			<input type="submit" id="submit" name="'.self::$Submit.'">

		</form> <script src="Client/script.js"> </script>';
	}
	
}

/*
$questions = array(
	array(
		"question" => "What is the creators name?",
		"option" => array("Kungen", "The Man", " ", "The Master"),
		"correct" => 2
	),
	array(
		"question" => "What is the creators name?",
		"option" => array("Kungen", "The Man", " ", "The Master"),
		"correct" => 2
	),
	array(
		"question" => "What is the creators name?",
		"option" => array("Kungen", "The Man", " ", "The Master"),
		"correct" => 2
	),
	array(
		"question" => "What is the creators name?",
		"option" => array("Kungen", "The Man", " ", "The Master"),
		"correct" => 2
	)
);
$q = array(
	"name" => "Bästa quizzet EVUR",
	"description" => "aljkfhksjdfh",
	"questions" => $questions
);

$quizJSON = json_encode($q, JSON_PRETTY_PRINT);

var_dump($quizJSON);

*/