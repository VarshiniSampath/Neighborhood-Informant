<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href='../less/reset.css' />
	<link rel='stylesheet/less' href='../less/search.less'/>
	<script src='../js/jquery-1.8.2.min.js'></script>
	<script src='../js/less.js'></script>
	<script src='../js/ui.js'></script>
	<script src='../js/queryconstruction.js'></script>
	<script src='../js/search.js'></script>
	<script src='http://maps.googleapis.com/maps/api/js'></script>
	<title>Neighborhood Informant</title>
</head>
<script>
  var val = ".$userSearchString.";
  var searchQuery = getSearchQuery(val);
  searchForHouses(searchQuery);
</script>
<body>
	<div class='outer-wrapper'>
		<div class='sidebar'>
			<ul>
				<li class='filter-separation'>
					<div class='logo'>Neighborhood Informant</div>		
				</li>
				<li class='filter-separation'>
					<div class='filter-heading'><div class='filter-icon amenities'></div>AMENITIES</div>		
					<ul class='amenities-controls'>
						<li><input type='checkbox' id='amenities1' name='parking_available'>Parking</li><br>
						<li><input type='checkbox' id='amenities2' name='laundry_available'>Laundry</li><br>
						<li><input type='checkbox' id='amenities3' name='pets_allowed'>Pets allowed</li><br>
						<li><input type='checkbox' id='amenities4' name='recreational_facilities'>Recreational facilities</li>
					</ul>
				</li>
				<li class='filter-separation'>
					<div class='filter-heading'><div class='filter-icon price'></div>PRICE</div>
					<input type='text' id='minCost' class='spacer2' placeholder='$'>
					<div class='to'>to</div>
					<input type='text' id='maxCost' class='spacer2' placeholder='$'>
				</li>
				<li class='filter-separation'>
					<div class='filter-heading'><div class='filter-icon apartment'></div>APARTMENT TYPE</div>
					<select id='apartmentType' name='apartment_type'>
						<option value='all'>All</option>
						<option value='house'>Houses</option>
						<option value='studio'>Studios</option>
						<option value='condo'>Condos</option>
					</select>
				</li>
				<li class='filter-separation'>
					<div class='filter-heading'><div class='filter-icon beds'></div>BEDS</div>
					<select id='bedCount' name='no_bedrooms'>
						<option value='all'>All</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
					</select>
				</li>
				<li class='filter-separation'>
					<div class='filter-heading'><div class='filter-icon baths'></div>BATHS</div>
					<select id='bathCount' name='no_bathrooms'>
						<option value='all'>All</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
					</select>
				</li>
				<li class='filter-separation'>
					<div class='filter-heading'><div class='filter-icon area'></div>AREA</div>
					<input type='text' id='minArea' class='spacer' placeholder='sq.ft'>
					<div class='to'>to</div>
					<input type='text' id='maxArea' class='spacer2' placeholder='sq.ft'>
				</li>
				<li class='filter-separation'>
					<button onclick='filter(searchQuery)' class='apply-filters'>APPLY FILTERS</button>
				</li>
			</ul>
		</div>
		<div class='search-results'>
			<input class='search' id='searchStr' placeholder='search'>
			<div class='content' id='resultContent'>
				
			</div>
		</div>	
	</div>
	<div class='overlay' style='display: block'></div>
	<!-- Preferences -->
	<div class='modal-preferences'>
		<div class='close'></div>
		<div class='modal-heading'>MY PREFERENCES</div>
		<div class='modal-secondary'>Change or apply your preferences to the current search.</div>
		<div class='modal-inner'>
			<div class='modal-100'>
				<div class='modal-subheading'>AMENITIES</div>
				<ul>
					<li><input type='checkbox' id='modal-amenities1' name='parking_available'><label for='modal-amenities1'>Parking</label></li>
					<li><input type='checkbox' id='modal-amenities2' name='laundry_available'><label for='modal-amenities2'>Laundry</label></li>
					<li><input type='checkbox' id='modal-amenities3' name='pets_allowed'><label for='modal-amenities3'>Pets allowed</label></li>
					<li><input type='checkbox' id='modal-amenities4' name='recreational_facilities'><label for='modal-amenities4'>Recreational facilities</label></li>
				</ul>
			</div>
			<div class='modal-50'>
				<div class='modal-subheading'>PRICE</div>
				<input type='text' id='minCost' class='' placeholder='$'>
				<div class='to'>to</div>
				<input type='text' id='maxCost' class='spacer2' placeholder='$'>
			</div>
			<div class='modal-50'>
				<div class='modal-subheading'>AREA</div>
				<input type='text' id='minArea' class='' placeholder='sq.ft'>
				<div class='to'>to</div>
				<input type='text' id='maxArea' class='spacer2' placeholder='sq.ft'>
			</div>
			<div class='modal-33'>
				<div class='modal-subheading'>APARTMENT TYPE</div>
				<select id='apartmentType' name='apartment_type'>
					<option value='all'>All</option>
					<option value='house'>Houses</option>
					<option value='studio'>Studios</option>
					<option value='condo'>Condos</option>
				</select>
			</div>
			<div class='modal-33'>
				<div class='modal-subheading'>BEDS</div>
				<select id='bedCount' name='no_bedrooms'>
					<option value='all'>All</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
				</select>
			</div>
			<div class='modal-33'>
				<div class='modal-subheading'>BATHS</div>
				<select id='bathCount' name='no_bathrooms'>
					<option value='all'>All</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
				</select>
			</div>
		</div>
		<div class='button-container'>
			<button class='savePreferences'>Save Preferences</button>
			<button class='savePreferences apply'>Save and apply</button>
			<button class='cancelPreferences'>Cancel</button>
		</div>
	</div>
</body>
<script>
	document.getElementById('searchStr').value = val;

	$(document).ready(function(){
		
		var myCenter1 = new google.maps.LatLng(41.8681472,-87.6668754);
		
	   	var mapProp1 = {
		  center:myCenter1,
		  zoom:15,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		};

	   	var map1 = new google.maps.Map(document.getElementById('mapcontent'),mapProp1);

		var marker1 = new google.maps.Marker({
			  position:myCenter1,
		});
		
		marker1.setMap(map1);

	});
</script>
</html>
<!-- 
<?php
require_once("../includes/init.php");
$userSearchString = $_POST["searchString"];
echo"

";
mysql_close($con);
?> -->