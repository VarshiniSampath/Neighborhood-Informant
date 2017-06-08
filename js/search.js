	var serverResponse;
	var mapMarker;
	var response;
	function searchForHouses(queryString) {	  
		
		var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	          	serverResponse = xmlhttp.responseText;
	           	response = ("{\"propSearchResults\":").concat(serverResponse).concat("}");
	          	displayResults();
	        }
	    }
		xmlhttp.open("GET", "searchDB.php?queryString="+ queryString, true);
	    xmlhttp.send();
	}
		
	function displayResults()
	{	
	    var parsedResult = $.parseJSON(response);
		var propCount = parsedResult.propSearchResults.length;
		
		var divmain = document.getElementById("resultContent");
		divmain.innerHTML= "";
		
		for(propIndex = 0; propIndex<propCount; propIndex++)	
		{
			var resultdiv = divmain.appendChild(document.createElement('div'));  
			resultdiv.setAttribute("class", "result");
			
			var mapdiv = resultdiv.appendChild(document.createElement('div'));
			var propdetailsdiv = resultdiv.appendChild(document.createElement('div'));
			mapdiv.setAttribute("class", "map");
			mapdiv.setAttribute("id", propIndex);
			propdetailsdiv.setAttribute("class", "prop-details");
			
			var builder = propdetailsdiv.appendChild(document.createElement('div'));
			var owner = propdetailsdiv.appendChild(document.createElement('div'));
			var propdetail = propdetailsdiv.appendChild(document.createElement('div'));
			builder.setAttribute("class","bclass");
			owner.setAttribute("class","oclass");
			propdetail.setAttribute("class","pclass");
			builder.innerHTML = parsedResult.propSearchResults[propIndex].name;
			owner.innerHTML= parsedResult.propSearchResults[propIndex].company;
			propdetail.innerHTML = "$".concat(parsedResult.propSearchResults[propIndex].price);
			
		
			var latitude = parseFloat(parsedResult.propSearchResults[propIndex].latitude)
			var longitude = parseFloat(parsedResult.propSearchResults[propIndex].longitude)
			
			displayInMap(latitude, longitude, propIndex);
		}
	}
	
	function displayInMap(x,y,id)
	{
		
		var myCenter = new google.maps.LatLng(x,y);
		
	   	var mapProp = {
		  center:myCenter,
		  zoom:15,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		};

	   	var map = new google.maps.Map(document.getElementById(id.toString()),mapProp);

		var marker = new google.maps.Marker({
			  position:myCenter,
		});
		
		marker.setMap(map);
	}

	