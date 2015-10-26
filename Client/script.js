(function() {
	var template = document.querySelector("#questionbase");
	template = template.parentNode.removeChild(template);
	var addQuestionButton = document.querySelector("#addquestion");
	var submitButton = document.querySelector("input[type=submit]");

	var questionsCount = 0; 

	addQuestionButton.addEventListener("click",function(event) {
		event.preventDefault();
		addQuestion();
	});


	function addQuestion(){
		var copy = template.cloneNode(true);
		copy.style.visibility = "visible";
		copy.style.display = "initial"; //block

		var myid = questionsCount;

		var questiontitle = copy.querySelector(".questiontitle");
		var questioncorrect = copy.querySelector(".correct");
		questiontitle.name = questiontitle.name.replace("Q",questionsCount);
		questioncorrect.name = questioncorrect.name.replace("Q",questionsCount);

		document.querySelector("#questionlist").appendChild(copy);

		var addoptionbutton = copy.querySelector(".addoption");
		var optioncount = 0;
		addoptionbutton.addEventListener("click", function(e) {
			e.preventDefault();
			var newoption = document.createElement("li");
			newoption.innerHTML = '<input type="text" name="questions['+ myid +'][options]['+optioncount+']">';
			addoptionbutton.parentNode.parentNode.insertBefore(newoption,addoptionbutton.parentNode);

			var answerList =  copy.querySelector("ol").querySelectorAll('input[type=text]'); //questions[Q][options][O]
			copy.querySelector(".correct").max = answerList.length;
			optioncount++;
		});
		questionsCount++;
	} 
})();