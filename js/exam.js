var row = 1;
var max = 0;
var tname = "";
function previous() {
	if(row > 1) {
		row--;
		showquestion(row.toString());
	}
}
function next() {
	if(row < max) {
		row++;
		showquestion(row.toString());
	}
}
function submit() {
	var option = document.abc.option.value;
      if (option == "") {
        document.getElementById("response").innerHTML = "";
        return;
    }  
	/* window.location.href = "response.php?option=" + option + "&q=" + row.toString();  */
     if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("response").innerHTML = xmlhttp.responseText;
        }
    }
    
    xmlhttp.open("GET","response.php?q="+ option + row.toString() ,true);
    xmlhttp.send(); 
}
function showquestion(str) {
	document.getElementById("response").innerHTML = "";
    if (str == "") {

        document.getElementById("question").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("question").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","exam.php?q="+str+ "&name=" + tname,true);
        xmlhttp.send();
    }
}
var m;
var s;
var myVar;
function start_time(){
	m = 0;
	s = 10;
	if(!myVar)
		myVar = setInterval(function(){ myTimer() }, 1000);
}
function myTimer() {
	if(s == 60)
	{
      s = 0;
      m++;
        if(m == 10) {
        	clearInterval(myVar);
        	myVar = null;
        	window.location.replace("exit.php?time=" + m+":"+s);
        }
	}
	s = checkTime(s);
	document.getElementById('time').innerHTML = m+":"+s;
	s++;
}
function checkTime(i) {
    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
function start_func(num, name) {
	
	max = num;
	tname = name;
	
	showquestion('1');
	start_time();
	
}
function exit_pop() {
    if (confirm("Press a button!") == true) {
    	window.location.replace("exit.php?time=" + m+":"+s+ "&name=" + tname);
    } 
}