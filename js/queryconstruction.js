function getSearchQuery(userSearchString){
	var queryString = "area_name='" + userSearchString + "' OR zip='" + userSearchString + "'";
	return queryString;
}

function getUserCriteria(){
    var usercriteria = "";
    
    //getting amenities values
    for(var i=1; i<=6; i++){
         var element = document.getElementById("amenities".concat(i));
		 if(element!==undefined && element!==null){
             var value = element.checked;
			 checkValue = "yes";
			 if(value==true){
				checkValue = "yes";
				usercriteria = usercriteria.concat(" AND ").concat(element.name).concat("='").concat(checkValue).concat("'");
			 }
         }
    }
    //getting textbox values
    otherElements = ["minCost", "maxCost", "minArea", "maxArea"];
    for(i=0; i<otherElements.length; i++){
        element = document.getElementById(otherElements[i]);
        if(element!==undefined && element!==null){
			value = element.value.trim();
			if(value.length>0){
                if(element.id=="minCost"){
						usercriteria = usercriteria.concat(" AND price>").concat(value);
                    }
				else if(element.id=="maxCost"){
					usercriteria = usercriteria.concat(" AND price<").concat(value);
				}
				else if(element.id=="minArea") {
					usercriteria = usercriteria.concat(" AND square_ft>").concat(value);
				}
				else if(element.id=="maxArea") {
					usercriteria = usercriteria.concat(" AND square_ft<").concat(value);
                }
            }
        }
    }
	//getting select menu inputs
	otherElements = ["bedCount", "bathCount", "apartmentType"];
	for(i=0; i<otherElements.length; i++){
        element = document.getElementById(otherElements[i]);
        if(element!==undefined && element!==null){
            value = element.value;
			if(value=="house"){
				usercriteria = usercriteria.concat(" AND (").concat(element.name).concat("!='condo'").concat(" AND ").concat(element.name).concat("!='studio')");
			}
			else if(value!="all"){
				usercriteria = usercriteria.concat(" AND ").concat(element.name).concat("='").concat(value).concat("'");
			}
		}
	}
    
	return usercriteria;
}

function filter(sQuery){
	if(validatePreferences()){
		var userCr = getUserCriteria();
		sQuery = sQuery.concat(userCr);
		searchForHouses(sQuery);
	}
}

function validatePreferences(){
	//checking if numeric fields contain only numeric values
	numericElements = ["minCost", "maxCost", "minArea", "maxArea"];
	isNumberFlag = true;
    for(i=0; i<numericElements.length; i++){
        element = document.getElementById(numericElements[i]);
        if(element!==undefined && element!==null){
			if(element.value!=null && element.value.length>0){
				isNumberFlag = isNumber(element);
				if(isNumberFlag == false){
					return false;
				}
			}
		}
	}
	//checking if min<max
	var minVal = parseInt(document.getElementById("minCost").value.trim());
	var maxVal = parseInt(document.getElementById("maxCost").value.trim());
	if(minVal > maxVal){
		alert("Oops! Minimum rent is lesser than the maximum rent.");
		document.getElementById("minCost").focus();
		return false;
	}
	if(minVal > maxVal){
		alert("Oops! Minimum sq.ft area is lesser than the sq.ft area.");
		document.getElementById("minCost").focus();
		return false;
	}
	return true;
}

function isNumber(elem){
    var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)!=null){
        return true;
    }
    else{
		alert("Please enter a numeric value.");
        elem.focus();
        return false;
    }
}