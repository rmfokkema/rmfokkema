var main;
var currentText;
var newText;
var textEditable = false;

function init()
{
	main = document.getElementById('main');
	
	updateCurrent();
	focusToEnd();
}


function updateCurrent()
{
	currentText = textCollection[textCollection.length-1];
	main.innerHTML = currentText;
	
	var t = setTimeout(function(){textEditable=true}, 500);
}

function focusToEnd()
{
	var lastCharacter = main.innerHTML.charAt(main.innerHTML.length-1);
	if (lastCharacter == "." | lastCharacter == "?" | lastCharacter == "!") main.innerHTML += '&nbsp;';
	
	main.focus();
	window.getSelection().collapse(main,1);
}

function checkr(event)
{
	if (main.innerHTML=='') return;

	newText = main.innerHTML;
	if (event.keyCode==13) {
		textCollection.push(newText);
		main.blur();
		textEditable = false;
	}
}

function checkc(event)
{
	if (event.keyCode==13) {
		if (textEditable) focusToEnd();
	}
	if (event.keyCode==27) {
		//if (textCollection.length>1) {
		if (textCollection.length==1) {
			main.innerHTML = '';
			main.focus();
			return;
		}
		
		textCollection.pop();
		//} else {
		//	textCollection = [''];
		//}
		
		newText = textCollection[textCollection.length-1];
		dong();
	}
}

function dong()
{	
	if (newText==undefined | newText == currentText) return;
	
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	      console.log(Math.random(0,10) + ' Updated.');
	      updateCurrent();
	      newText = undefined;
	  }
    };

    xhttp.open("POST", "./", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("t=" + newText);
}
