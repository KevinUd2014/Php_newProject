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

		if(isset($_GET['Quiz']))
		{
			return "<a href=?>Avsluta</a>";
		}
		else
	    	return "<a href=?Quiz>Start a Quiz</a>";
	}
}