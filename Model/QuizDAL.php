<?php

class QuizDAL{

	private static $FILE = "Json/quiz.json";

    public function getQuestions($file){

        $rawfile = file_get_contents($file);
            
        $json = json_decode($rawfile, true);
        $questions = $json["questions"];
           
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