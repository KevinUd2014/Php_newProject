<?php

class CreateAQuizView{

	private static $Name = "CreateAQuizView::Name";
	private static $Description = "CreateAQuizView::Description";
	private static $Submit = "CreateAQuizView::Submit";
	private $message = "";

	public function response() {
		$response = "";

		//var_dump(isset($_GET["CreatedQuiz"]));

		if(isset($_GET["CreateQuiz"])){
			$response .= $this->generateCreateQuizFormHTML();
		}
		//$this->checkIfPosted();
		return $response;
	}

	public function checkIfPosted(&$data) 
	{
		
		if (isset($_POST[self::$Submit])) 
		{
			$data = array("questions" => (isset($_POST["questions"]) ? $_POST["questions"] : null), "title" => $_POST[self::$Name], "description" => $_POST[self::$Description]);
			return true;
		}
		return false;  
	}
	public function actionMessages($message){//denna används inte tror jag!
		
		$this->message = $message;
	}

	private function generateCreateQuizFormHTML() {

		return '
		<form method="POST" action="?CreateQuiz">
	
			<p>'.$this->message.'</p>
			Quiz name(No blank spaces!): <br>
			<input type="text" id="title" name="'.self::$Name.'">
			<br>
			Description: <br>
			<input type="text" id="description" name="'.self::$Description.'">
			<fieldset id="questionbase">
			  	<legend>Question: </legend>
			  	<input type="text" name="questions[Q][title]" class="questiontitle">

			  	<ol>

			  		<li>
			  			<button class="addoption">Add option</button>
			  		</li>
			  	</ol>
			  	<label>Correct answer:</label> <input type="number" name="questions[Q][correct]" min="1" max="1" value="1" class="correct">
			</fieldset>
			<div id="questionlist"> 

			</div>

			<button id="addquestion">Add question</button>
				<br>
				<br>
			<input type="submit" id="submit" value="Create quiz" name="'.self::$Submit.'">

		</form> <script src="Client/script.js"> </script>';
	}
	
}