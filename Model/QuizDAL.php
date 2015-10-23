<?php

class QuizDAL{

    public function getQuestions($file){

        $rawfile = file_get_contents($file);
            
        $quiz = unserialize($rawfile);

        /*
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
        */

        return $quiz;
    }

    public function writeToBin($file, $object){
        $json = serialize($object);

        file_put_contents($file, $json);
    }

    public function getQuizes()
    {
        return glob("Model/quizes/*.bin");
    }

    public function convert()
    {
        foreach (glob("Model/Json/*.json") as $filename)
        {
            $oldquiz = json_decode(file_get_contents($filename),true);
            $newquiz = new Quiz($oldquiz["name"],$oldquiz["description"]);

            foreach ($oldquiz["questions"] as $q)
            {
                $newquiz->addQuestion(new QuizQuestion($q["question"],$q["option"],$q["correct"]));
            }
            file_put_contents("Model/quizes/".basename($filename).".bin", serialize($newquiz));
        }
    }
}