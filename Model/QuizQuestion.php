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

		public function getQuestion()
		{
			return $this->question;
		}
		public function getOptions()
		{
			return $this->options;
		}
		public function getCorrectAnswer()
		{
			return $this->correctAnswer;
		}
		public function getAnswer()
		{
			return $this->answer;
		}

		public function setAnswer($answer)
		{
			$this->answer = $answer;
		}

		public function isCorrect()
		{
			if ($this->answer == $this->correctAnswer && $this->answer !== null)
				return true;
			return false;
		}
	}