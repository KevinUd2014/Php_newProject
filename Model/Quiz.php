<?php
class Quiz{
	private $title;
	private $description;

	private $questions;

	public function __construct($title, $description){
		$this->title = $title;
		$this->description = $description;

		$this->questions = array();
	}

	public function addQuestion($question){//lägger till frågorna
		array_push($this->questions, $question);
	}

	public function getQuestions()
	{
		return $this->questions;
	}

	public function getTitle(){//hämtar namen
		return $this->title; 
	}
}