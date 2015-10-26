<?php
	class QuizQuestion{

		private $question;
		private $options = array();
		private $correctAnswer;
		private $answer = null;

		public function __construct($question,$options,$correct)
		{
			$this->question = $question;
			$this->options = $options;
			$this->correctAnswer = $correct;
		}

		public function getQuestion() //hämtar frågor
		{
			return $this->question;
		}
		public function getOptions() //hämtar options
		{
			return $this->options;
		}
		public function getCorrectAnswer()//hämtar rätta svaret
		{
			return $this->correctAnswer;
		}
		public function getAnswer()//hämtar svaren
		{
			return $this->answer;
		}

		public function setAnswer($answer)//sätter svaren
		{
			$this->answer = $answer;
		}

		public function isCorrect()//returnerar om mna svarat rätt!
		{
			if ($this->answer == $this->correctAnswer && $this->answer !== null)
				return true;
			return false;
		}
	}