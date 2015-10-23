<?php

class LayoutView{
	private $quizes;
	public function render($didUserStart, $v) {
	    echo '<!DOCTYPE html>
	      <html>
	        <head>
	          <meta charset="utf-8">
	          <title>ProjectIzzle</title>
	          <link type="text/css" rel="stylesheet" href="View/style.css">
	        </head>
	        <body>
	          <h1>Playissle My Quizlesizzzle</h1>
	          <div class="container">
	          	  ' . $this->generateQuizButton() . '
	              ' . ($v != null ? $v->response() : "") . '
	          </div>
	         </body>
	      </html>
	    ';
    }

    public function setQuizes($quizes)
    {
    	$this->quizes = $quizes;
    }

	private function generateQuizButton(){

		if(isset($_GET['Quiz']) || isset($_GET['CreateQuiz']))//|| isset($_GET['QuizResultPage']) || isset($_GET['MusicQuiz']) || isset($_GET['ClassicMusicQuiz'])
		{//avsluta knappen ska vara tillgänglig hela tiden!
			return "<a href=?>Avsluta</a>";
		}
		else//genererar de olika länkarna till mina olika quiz!
		{
			$html = "";
			foreach ($this->quizes as $quiz)
			{
				$name = basename(str_replace(".bin","",$quiz));
				$html .= "<a href=?Quiz=$name>Start $name</a><br>";
			}

	    	$randomQuiz = "<a href=?Quiz=random>Start a random Quiz</a> <br/><br/>";
	    	$startAQuiz = "<a href=?Quiz=quiz>Start the Ordinary Quiz</a> <br/><br/>";
	    	$musicQuiz = "<a href=?Quiz=music>Start a Music Quiz</a> <br/><br/>";
	    	$classicMusicQuiz = "<a href=?Quiz=classicmusic>Start a Classic Music Quiz</a> <br/><br/>";
	    	$createQuiz = "<a href=?CreateQuiz>Create a Quiz</a> <br/><br/>";
	    	return $randomQuiz . $html . $createQuiz;
	    }
	}
}