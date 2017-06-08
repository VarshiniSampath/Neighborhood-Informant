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
	<div class='slideOut' id='slideOut'>
		<div class='mapcontent' id='mapcontent'></div>
		<div class="content-container">
			<div class='property-name'>Wrightwood Senior Apartments</div>
			<div class='property-price'>$1768</div>
			<div class='property-phone'>773-471-7777</div>
			<div class='property-company'>Managed by: Ludwig and Company</div>
			<div class='property-address'>2815 W. 79th St., Ashburn, Chicago - 60607.</div>
			<!-- <div class='property-area'>Ashburn</div> -->
			<div class='secondary-details'>
				<div class='secondary-info property-type'>Property type: Condo</div>
				<div class='secondary-info property-bedrooms'>Number of Bedrooms: 3</div>
				<div class='secondary-info property-bathrooms'>Number of Bathrooms: 3</div>
				<div class='secondary-info property-area'>Area (in sqft): 2350</div>
				<div class='secondary-info property-parking'>Parking: Yes</div>
				<div class='secondary-info property-pets'>Pets alowed: Yes</div>
				<div class='secondary-info property-laundry'>Laundry: Yes</div>
				<div class='secondary-info property-interiors'>Interiors: Furnished</div>
				<div class='secondary-info property-recreation'>Recreational Facilities: No</div>
			</div>
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