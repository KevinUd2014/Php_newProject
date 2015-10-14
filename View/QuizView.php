<?php
	class QuizView{
		private static $startQuiz = "QuizView::Result";
		private static $answersOfQuiz = "QuizView::Answers";
		private $arrayOfAnswers = array();

		private $quizList;

		public function didUserPostQuiz(){
			if(isset($_POST[self::$startQuiz])){
				return true;
			}
		}
		public function GetAnswers(){

			$i = 1;
			foreach($this->quizList as $quizquestion)
			{
				if(isset($_POST[$i]))	
					array_push($this->arrayOfAnswers, $_POST[$i]);
				$i++;
			}

			/*foreach($this->arrayOfAnswers as $answer)
			{
				echo $answer;
			}*/ //DENNA TESTAR OM VAD MAN FÅR UT FÖR VÄRDEN UR ARRAYEN!

			//return $this->arrayOfAnswers;


			/*if(isset($_POST[self::$answersOfQuiz])){
				return isset($_POST[self::$answersOfQuiz]);
			}*/
		}

		public function setQuizList($quizList)
		{
			$this->quizList = $quizList;
		}
		public function actionMessages($message){
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
			$html = '<form method="post" >';
			$i = 1;

			foreach($this->quizList as $qq)
			{

				//name=\"q$i\"/ EFTER RADIO!
				$question = $qq->getQuestion();
				$options = $qq->getOptions();
				$html .= "<p class=\"question\">$i. $question</p><ul class=\"answers\">";

				$o = 0;
				foreach ($options as $option)
				{
					$html .= "<input type=\"radio\" name=\"$i\" value=\"$o\" id=\"q$i-$o\"><label for=\"q$i-$o\">$option</label><br/>";			
					$o++;		
				}

				$html .= '</ul>';

				$i++;
			}

			$html .= '<input type="submit" name="' . self::$startQuiz . '" value="Get a Result" /></form>';

			return $html;		
		}

	

		private function generateQuizResultFormHTML(){
			return '
				<form method="post" >
					<p class="question">Here is your result!</p>
				</form>
			';
		}
	}