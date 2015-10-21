// XMLHttpRequest is most important object in Ajax
var xmlHttp = createXmlHttpRequestObject(); // important object used to communicate to sever/php file to get respond and refresh your partial page


function createXmlHttpRequestObject(){
	var xml_Http;
	
	if(window.ActiveXObject){
		try{
			xml_Http = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
		}catch(e){
			xml_Http = false;
		}
	}else{
		try{
			xml_Http = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
		}catch(e){
			xml_Http = false;
		}
	}
	
	if(!xml_Http)
		alert("can not create object hoss");
	else
		return xml_Http;
}

function process(){
	if(xmlHttp.readyState==4 || xmlHttp.readyState==0){ // the object state is not busy and ready to connect to sever
		
		xmlHttp.open("GET", "edit-items.php", true); // create a requst but not send yet
		// first parameter: type of requst
		// second parameter: provide url to connect
		// third parameter: if handle it synchronously, if true - yes, false - no
		
		xmlHttp.onreadystatechange = handleServerResponse; // onreadystatechange means when responds comes, carryout the handleServerResponse function to refresh partial page or do some other things with web file
		
		xmlHttp.send(null); // parameter within send function is only for post, if use get requst, just type in null
	}else{
		alert('readyState!');
		//setTimeout('process()', 1000); // if already connect and busy, wait and carry out process again.
	}
	
}

function handleServerResponse(){ // deal with the receive XML file (from server/php)
	if(xmlHttp.readyState==4){ // check state first, readyState == 4 means if object is done communicating/communication session is over
		if(xmlHttp.status==200){ // check status, 200 means communication were OK, means server part and feedback works well
			xmlResponse = xmlHttp.responseText; // restore xml response to a variable
			//xmlDocumentElement = xmlResponse.documentElement; // get xml elements
			//message = xmlDocumentElement.firstChild.data; // get particular element's (firstChild means first element) message (data between tags)
			document.getElementById("edit-list").innerHTML = xmlResponse;
		}
	}else{
		//alert('Something went wrong!'); // for debug
		//setTimeout('process()', 1000);
	}
	
}





