(function() {
	var template = document.querySelector("#questionbase");
	var addQuestionButton = document.querySelector("#addquestion");
	var submitButton = document.querySelector("input[type=submit]");

	addQuestionButton.addEventListener("click",function(event) {
		event.preventDefault();
		addQuestion();
	});

	submitButton.addEventListener("click",submit);


	function addQuestion(){
		var copy = template.cloneNode(true);
		copy.style.visibility = "visible";
		copy.style.display = "initial"; //block

		document.querySelector("#questionlist").appendChild(copy);
		copy.querySelector(".remove").addEventListener("click", function(e) {
			e.preventDefault();
			copy.parentNode.removeChild(copy);
		});

		var addoptionbutton = copy.querySelector(".addoption");
		addoptionbutton.addEventListener("click", function(e) {
			e.preventDefault();
			var newoption = document.createElement("li");
			newoption.innerHTML = '<input type="text">';
			addoptionbutton.parentNode.parentNode.insertBefore(newoption,addoptionbutton.parentNode);

			var answerList =  copy.querySelector("ol").querySelectorAll('input[type=text]');
			copy.querySelector(".correct").max = answerList.length;
		});
	}

	function submit(e){
		e.preventDefault();
		var questionsList = document.querySelector("#questionlist").querySelectorAll("fieldset");
		
		var questions = [];
		var answers = [];


		for (var i = 0; i<questionsList.length; i++)
		{
			var questionElement = questionsList.item(i);
			var text = questionElement.querySelector("input[name=question]");
			var question = {text: text.value,options:[], correct: questionElement.querySelector(".correct").value};

			var answerList =  questionElement.querySelector("ol").querySelectorAll('input[type=text]');

			for (var j = 0; j<answerList.length; j++)
			{
				var answerElement = answerList.item(j);
				console.log(answerElement);
				var answerText = answerElement.value;
				question.options.push(answerText);

			}

			//hämta alla input i ol
			//loopa alla inpot... i ol
			//	hämta alla input.value i input i ol pusha in i question.options

			questions.push(question);
		}
		var form = document.createElement("form");
		form.style.display = "none";
		form.appendChild(document.querySelector("#title").cloneNode(true));
		form.appendChild(document.querySelector("#description").cloneNode(true));

		var submit = document.createElement("input");
		submit.name = document.querySelector("#submit").name;
		form.appendChild(submit);

		var dataelement = document.createElement("input");
		dataelement.value = JSON.stringify(questions);
		dataelement.name = "data";
		form.appendChild(dataelement);

		form.method = "POST";
		form.action = "?CreatedQuiz";

		document.body.appendChild(form);

		console.log(form);
		form.submit();
	}

})();