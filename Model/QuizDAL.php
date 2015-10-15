<?php

class QuizDAL{

	private static $FILE = "Json/quiz.json";

    public function getQuestions($file){

        $rawfile = file_get_contents($file);
            
        $json = json_decode($rawfile, true);
        $questions = $json["questions"];
/*
        if(isset($_GET["Quiz"])){

            $questions = $json["questions"];
        }
        else if(isset($_GET["MusicQuiz"])){

            $questions = $json["musicQuestions"];
        }
        else if(isset($_GET["ClassicMusicQuiz"])){

            $questions = $json["ClassicMusicQuestions"];
        }
  */      
        $list = array();
        
        foreach ($questions as $q)
        {
            $question = $q["question"];
            $options = $q["option"];
            $correct = $q["correct"];
            
            array_push($list, new QuizQuestion($question,$options,$correct));
        }

        $quiz = array("name" => $json["name"], "description" => $json["description"], "questions" => $list);

        return $quiz;
    }

    public function writeToJson($file, $object){
        $json = json_encode($object);
        file_put_contents($file, $json);
    }
}