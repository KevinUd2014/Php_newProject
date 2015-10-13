<?php
	class QuizView{
		private static $startQuiz = "Start::Quiz";

		private $quizList;

		public function checkUserLoginPost(){
		//denna kollar att man har rätt inlogingnsuppgifter!
			if(isset($_POST[self::$startQuiz]))//kollar så att man skrivet i något i fälten!
			{		
				return true;
			}
		}

		public function setQuizList($quizList)
		{
			$this->quizList = $quizList;
		}

		public function response() {
		
			$response = "";

			if(isset($_GET["Quiz"])){
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
				$question = $qq->getQuestion();
				$options = $qq->getOptions();
				$html .= "<p class=\"question\">$i. $question</p><ul class=\"answers\">";

				$o = 0;
				foreach ($options as $option)
				{
					$html .= "<input type=\"radio\" name=\"q$i\" value=\"$o\" id=\"q$i-$o\"><label for=\"q$i-$o\">$option</label><br/>";
					$o++;
				}

				$html .= '</ul>';

				$i++;
			}
			$html .= '<a href=?QuizResultPage>Result</a></form>';

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