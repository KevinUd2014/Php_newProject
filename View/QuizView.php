<?php
	class QuizView{
		private static $startQuiz = "Start::Quiz";

		public function checkUserLoginPost(){
		//denna kollar att man har rätt inlogingnsuppgifter!
			if(isset($_POST[self::$startQuiz]))//kollar så att man skrivet i något i fälten!
			{		
				return true;
			}
		}
		public function response() {
		
			$response = "";

			if(isset($_GET["Quiz"])){
				$response .= $this->generateQuizFormHTML();
			}
			return $response;
		}
		private function generateQuizFormHTML() {
			return '
				<form method="post" >
					<p class="question">1. What was the answer to the question you were wrong on?</p>
					<ul class="answers">
						<input type="radio" name="q1" value="a" id="q1a"><label for="q1a">This</label><br/>
						<input type="radio" name="q1" value="b" id="q1b"><label for="q1b">or this</label><br/>
						<input type="radio" name="q1" value="c" id="q1c"><label for="q1c">or this</label><br/>
						<input type="radio" name="q1" value="d" id="q1d"><label for="q1d">or is it this one?</label><br/>
					</ul> 
					<p class="question">2. Who is the next president of the moon?</p>
					<ul class="answers">
						<input type="radio" name="q2" value="a" id="q2a"><label for="q2a">a</label><br/>
						<input type="radio" name="q2" value="b" id="q2b"><label for="q2b">b</label><br/>
						<input type="radio" name="q2" value="c" id="q2c"><label for="q2c">c</label><br/>
						<input type="radio" name="q2" value="d" id="q2d"><label for="q2d">d</label><br/>
					</ul> 
					<p class="question">3. What was the answer to the question you were wrong on?</p>
					<ul class="answers">
						<input type="radio" name="q3" value="a" id="q3a"><label for="q3a">O</label><br/>
						<input type="radio" name="q3" value="b" id="q3b"><label for="q3b">M</label><br/>
						<input type="radio" name="q3" value="c" id="q3c"><label for="q3c">G</label><br/>
						<input type="radio" name="q3" value="d" id="q3d"><label for="q3d">!</label><br/>
						<input type="radio" name="q3" value="d" id="q3d"><label for="q3d"></label><br/>
					</ul> 
				</form>
			';
		
		}
	}