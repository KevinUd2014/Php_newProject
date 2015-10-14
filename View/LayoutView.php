<?php

class LayoutView{

	public function render($didUserStart, $v) {
	    echo '<!DOCTYPE html>
	      <html>
	        <head>
	          <meta charset="utf-8">
	          <title>ProjectIzzle</title>
	        </head>
	        <body>
	          <h1>Playissle My Quizlesizzzle</h1>
	          <div class="container">
	          	  ' . $this->generateQuizButton() . '
	              ' . $v->response() . '
	          </div>
	         </body>
	      </html>
	    ';
    }
	private function generateQuizButton(){

		if(isset($_GET['Quiz']) || isset($_GET['QuizResultPage']) || isset($_GET['MusicQuiz']) || isset($_GET['ClassicMusicQuiz']))
		{//avsluta knappen ska vara tillgänglig hela tiden!
			return "<a href=?>Avsluta</a>";
		}
		else//genererar de olika länkarna till mina olika quiz!
		{
	    	$startAQuiz = "<a href=?Quiz>Start a Quiz</a> <br/><br/>";
	    	$musicQuiz = "<a href=?MusicQuiz>Start a MusicQuiz</a> <br/><br/>";
	    	$classicMusicQuiz = "<a href=?ClassicMusicQuiz>Start a MusicQuiz</a> <br/><br/>";
	    	return $startAQuiz . $musicQuiz . $classicMusicQuiz;
	    }
	}
}