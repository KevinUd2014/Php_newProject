<?php

class QuizDAL{

	private static $FILE = "Json/quiz.json";

    public function getQuestions(){

        $rawfile = file_get_contents(self::$FILE,  true);
            
        $json = json_decode($rawfile, true);

        if(isset($_GET["Quiz"])){

            $questions = $json["questions"];
        }
        else if(isset($_GET["MusicQuiz"])){

            $questions = $json["musicQuestions"];
        }
        else if(isset($_GET["ClassicMusicQuiz"])){

            $questions = $json["ClassicMusicQuestions"];
        }
        
        $list = array();
        
        foreach ($questions as $q)
        {
            $question = $q["question"];
            $options = $q["option"];
            $correct = $q["correct"];
            
            array_push($list, new QuizQuestion($question,$options,$correct));
        }
        

        return $list;
    }
}