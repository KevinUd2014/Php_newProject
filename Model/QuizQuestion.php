<?php
	class QuizQuestion{

		private $question;
		private $options = array();
		private $correctAnswer;

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
		public function getAnswer()
		{
			return $this->correctAnswer;
		}
	}