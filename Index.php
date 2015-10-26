<?php
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
echo('<pre>');
var_dump($quizJSON);
echo('</pre>');
exit;
*/  
	require_once("Controller/MasterController.php");

	$masterController = new MasterController();

	$masterController->startMyApplication();
