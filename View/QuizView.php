<?php
	class QuizView{
		private static $startQuiz = "QuizView::Result";
		private static $answersOfQuiz = "QuizView::Answers";
		private $arrayOfAnswers = array();

		private $quiz;
		private $quizList;
		private $quizname;

		private $showCorrect;

		public function didUserPostQuiz(){
			if(isset($_POST[self::$startQuiz])){
				$this->showCorrect = true;
				return true;
			}
		}
		public function GetAnswers(){

			$questionIndex = 1;
			foreach($this->quizList as $quizquestion)
			{
				if(isset($_POST["q$questionIndex"]))
				{
					array_push($this->arrayOfAnswers, intval($_POST["q$questionIndex"]));
					//$quizquestion->setAnswer(intval($_POST["q$questionIndex"]));

				}
				else
					array_push($this->arrayOfAnswers,null);
				//var_dump($quizquestion,true);
				$questionIndex++;
			}
			/*
			foreach($this->arrayOfAnswers as $answer)
			{
				echo $answer;
			}*/ //DENNA TESTAR OM VAD MAN FÅR UT FÖR VÄRDEN UR ARRAYEN!

			return $this->arrayOfAnswers;
		}

		public function setQuizList($quizname,$quiz)
		{
			$this->quiz = $quiz;
			$this->quizList = $quiz["questions"];
			$this->quizname = $quizname;
		}
		public function actionMessages($message){//denna används inte tror jag!
		    //echo $message;
			$this->message = $message;
		}

		public function response() {
		
			$response = "";

			if(isset($_GET["Quiz"])){
				$response .= $this->generateQuizFormHTML();
			}
			else if(isset($_GET["MusicQuiz"])){
				$response .= $this->generateQuizFormHTML();
			}
			else if(isset($_GET["ClassicMusicQuiz"])){
				$response .= $this->generateQuizFormHTML();
			}
			else if(isset($_GET["QuizResultPage"])){
				$response .= $this->generateQuizResultFormHTML();
			}

			return $response;
		}

		private function generateQuizFormHTML() {
			$html = '<h2>'.$this->quiz["name"].'</h2><form method="post" action="?Quiz='.$this->quizname.'" >';
			$questionIndex = 1;
			$disabled = "";
			if ($this->showCorrect)
				$disabled = "disabled";

			foreach($this->quizList as $qq)
			{

				//name=\"q$questionIndex\"/ EFTER RADIO!
				$question = $qq->getQuestion();
				$options = $qq->getOptions();
				$html .= "<p class=\"question\">$questionIndex. $question</p><ul class=\"answers\">";
				$class = "";
				$selected = null;

				if ($this->showCorrect)
				{
					$selected = $qq->getAnswer();

					if ($qq->isCorrect())
						$class = "correct";
					else
						$class = "wrong";
				}

				$optionIndex = 0;
				foreach ($options as $option)
				{
					if ($this->showCorrect && $selected === $optionIndex)
					{
						$html .= "<input type=\"radio\" name=\"q$questionIndex\" value=\"$optionIndex\" checked $disabled>";
						$html .= "<label class=\"$class\">$option</label><br/>";
					}
					else
					{
						$html .= "<input type=\"radio\" name=\"q$questionIndex\" value=\"$optionIndex\" $disabled><label>$option</label><br/>";
					}	
					$optionIndex++;
				}

				$html .= '</ul>';

				$questionIndex++;
			}

			$html .= "<input type=\"submit\" name=\"" . self::$startQuiz . "\" value=\"Get a Result\" $disabled/></form>";

			return $html;		
		}
	}