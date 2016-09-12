<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
 <div class="col-md-9">
<form id="SignupForm" action="">
       
		   <fieldset>
            <div class="col-md-12"><legend>Basic Information</legend></div>
			<div class="col-md-6"> 
			<div class="ibox-content clearfix">
				<h2>City</h2>
					<div class="btn-group custom-select cs-default" uib-dropdown>
                        <button id="single-button" type="button" class="custom-select-val" uib-dropdown-toggle ng-disabled="disabled" ng-model="city">                   
                            <div class="custom-select-item-content">{{cityname}}</div>
                        </button>
                        <ul class="dropdown-menu custom-select-list stroll-list cards" uib-dropdown-menu role="menu" aria-labelledby="single-button">
                        <li class="past" ng-click="noevent($event);" >
                            <input type="text" name="state" placeholder="Enter city name" ng-model="cquery">
                        </li>
                        <li ng-repeat="city in cities|filter:cquery" class="past" ng-animate="'animate'">
                            <div class="custom-select-item-content" ng-click="location(city.id,city.name)">{{city.name}}</div>
                        </li>
                        </ul>
                </div>
			</div>
			</div>
            <div class="col-md-6">
			   <div class="ibox-content">
				   <h2>Locality</h2>
                     <div class="btn-group custom-select cs-default" uib-dropdown>
                        <button id="single-button" type="button" class="custom-select-val" uib-dropdown-toggle ng-disabled="disabled" ng-model="locality">                            <div class="custom-select-item-content">{{localityname}}</div>
                        </button>
                        <ul class="dropdown-menu custom-select-list stroll-list cards" uib-dropdown-menu role="menu" aria-labelledby="single-button">
                        <li class="past" ng-click="noevent($event);" >
                            <input type="text" name="state" placeholder="Enter locality name" ng-model="lquery">
                        </li>
                        <li ng-repeat="location in locations|filter:lquery" class="past" ng-animate="'animate'">
                            <div class="custom-select-item-content" ng-click="selectlocation(location.id,location.name)">{{location.name}}</div>
                        </li>
                        </ul>
                </div>
						
			   </div>			
			</div>	
			<div class="col-md-6">
			                <div class="ibox-content">
								<h2>List Property For :</h2>
								<select class="input-sm form-control input-s-sm inline">
											<option value="0">Buy</option>
											<option value="1">Sell</option>
											<option value="2">Rent</option>
											
										</select>
							</div>
			</div>
			<div class="col-md-6">
							<div class="ibox-content">
								<h2>Property Type :</h2>
								<select class="input-sm form-control input-s-sm inline">
											<option value="0">Apartment</option>
											<option value="1">Independent/Builder floor</option>
											<option value="2">Villa</option>
											<option value="2">Independent house</option>
											
										</select>
							</div>
						</div>
			
           
        </fieldset>
		
        <fieldset>
            <div class="col-md-12">
			<legend>Amenities</legend>
            <div class="ibox-content amenities clearfix">
				<div class="col-md-3 pdallnone" ng-repeat="ameinity in amenities">
					<label class=""><checkbox ng-model="aminitieschk[ameinity.id]" ></checkbox>{{ameinity.id}} {{ameinity.name}}</label>
				</div>
			</div>
            
			</div>
			
        </fieldset>
        <fieldset>
		    <div class="col-md-12">
            <legend>Property Detail</legend>
            </div>
			<div class="col-md-6">
			                <div class="ibox-content">
								<h2>Configuration :</h2>
								<select class="input-sm form-control input-s-sm inline">
											<option value="1">1 BHK</option>
											<option value="2">2 BHK</option>
											<option value="3">3 BHK</option>
											<option value="4">4 BHK</option>
											
										</select>
							</div>
			</div>
			<div class="col-md-6">
			                <div class="ibox-content">
								<h2>No. of Bathrooms :</h2>
								<select class="input-sm form-control input-s-sm inline">
											<option value="1">1 </option>
											<option value="2">2 </option>
											<option value="3">3 </option>
											<option value="4">4 </option>
											<option value="5">5 </option>
											
										</select>
							</div>
			</div>
			<div class="col-md-6">
			                <div class="ibox-content">
								<h2>No. of Balconies :</h2>
								<select class="input-sm form-control input-s-sm inline">
											<option value="1">1 </option>
											<option value="2">2 </option>
											<option value="3">3 </option>
											<option value="4">4 </option>
											<option value="5">5 </option>
											
										</select>
							</div>
			</div>
			<div class="col-md-6">
			                <div class="ibox-content clearfix">
								<h2>Other Rooms</h2>
								<div class="col-md-4 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		Study  </label>
				</div>
				<div class="col-md-4 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		Servant  </label>
				</div>
				<div class="col-md-4 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		Other </label>
				</div>
							</div>
			</div>
			
			<div class="col-md-6">
			                <div class="ibox-content">
								<h2>Furnishing</h2>
								<select class="input-sm form-control input-s-sm inline">
											<option value="1">Furnished </option>
											<option value="2">Semi-Furnished </option>
											<option value="3">Unfurnished </option>
											
										</select>
							</div>
			</div>
			<div class="col-md-6">
			                <div class="ibox-content clearfix">
								<h2>Parking</h2>
			<div class="col-md-4 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		Open </label>
				</div>
				<div class="col-md-4 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		Covered </label>
				</div>
				<div class="col-md-4 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		None </label>
				</div>
							</div>
			</div>
			
        </fieldset>
		
		<fieldset>
            <div class="col-md-12">
			<legend>Complete Address </legend>
            </div>
						
			<div class="col-md-6">
			   <div class="ibox-content clearfix">
			      <h2>Search by Project Name or Builder</h2>
			      <input type="text" class="form-control">
			   </div>
			</div>
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Flat/House/Apartment Number</h2>
			      <input type="text" class="form-control">
			   </div>
			</div>
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Tower/Building Number</h2>
			      <input type="text" class="form-control">
			   </div>
			</div>
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Block Number/Name</h2>
			      <input type="text" class="form-control">
			   </div>
			</div>
			<div class="col-md-12">
			    <div class="ibox-content">
				  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d899849.823424806!2d76.70739005116732!3d28.236514963496376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19d582e38859%3A0x2cf5fe8e5c64b1e!2sGurgaon%2C+Haryana+122001!5e0!3m2!1sen!2sin!4v1473339528004" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			
        </fieldset>
		
		<fieldset>
            <div class="col-md-12">
			<legend>Pricing </legend>
            </div>
			
			
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Total Floors in Building</h2>
			      <select class="input-sm form-control input-s-sm inline">
											<option value="1">1 </option>
											<option value="2">2 </option>
											<option value="3">3 </option>
											<option value="4">4 </option>
											<option value="5">5 </option>
											<option value="6">6 </option>
											<option value="7">7 </option>
											<option value="8">8 </option>
											<option value="9">9 </option>
											<option value="10">10 </option>
											<option value="11">11 </option>
											<option value="12">12 </option>
											<option value="13">13 </option>
											<option value="14">14 </option>
											<option value="15">15 </option>
											<option value="16">16 </option>
											<option value="17">17 </option>
											<option value="18">18 </option>
											<option value="19">19 </option>
											<option value="20">20 </option>
											<option value="20">>20 </option>
											
										</select>
			   </div>
			</div>
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Property on Floor</h2>
			      <select class="input-sm form-control input-s-sm inline">
											<option value="1">1 </option>
											<option value="2">2 </option>
											<option value="3">3 </option>
											<option value="4">4 </option>
											<option value="5">5 </option>
											<option value="6">6 </option>
											<option value="7">7 </option>
											<option value="8">8 </option>
											<option value="9">9 </option>
											<option value="10">10 </option>
											<option value="11">11 </option>
											<option value="12">12 </option>
											<option value="13">13 </option>
											<option value="14">14 </option>
											<option value="15">15 </option>
											<option value="16">16 </option>
											<option value="17">17 </option>
											<option value="18">18 </option>
											<option value="19">19 </option>
											<option value="20">20 </option>
											<option value="20">>20 </option>
											
										</select>
			   </div>
			</div>
			
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Expected Price</h2>
			      <div class="input-group"><span class="input-group-addon"> <i class="fa fa-inr"></i> </span> <input type="text" class="form-control"></div>
			   </div>
			</div>
			
			<div class="col-md-6">
			   <div class="ibox-content clearfix">
			      <h2>Price Negotiable</h2>
			      <div class="col-md-6">
					<label class=""> 
		<div class="iradio_square-green" style="position: relative;">
		<input type="radio" value="option1" name="negotiate" class="i-checks" style="position: absolute; opacity: 0;">
		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> <i></i> 							
		Negotiable </label>
				</div>
				<div class="col-md-6">
					<label class=""> 
		<div class="iradio_square-green" style="position: relative;">
		<input type="radio" value="option2" name="negotiate" class="i-checks" style="position: absolute; opacity: 0;">
		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> <i></i> 							
		Unnegotiable </label>
				</div>
			   </div>
			</div>
			
			<div class="col-md-12">
			   <div class="ibox-content clearfix">
			      <h2>Price Includes </h2>
			      <div class="col-md-3 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		Parking </label>
				</div>
				<div class="col-md-3 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		PLC </label>
				</div>
				<div class="col-md-3 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		EDC/IDC </label>
				</div>
				<div class="col-md-3 pdallnone">
					<label class=""> 
		<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
		Registration</label>
				</div>
				
			   </div>
			</div>
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Age of property/construction</h2>
			      <select class="input-sm form-control input-s-sm inline">
											<option value="1">Less Than 1 year </option>
											<option value="2">1-3 year </option>
											<option value="3">3-5 year</option>
											<option value="4">5-10 year</option>
					</select>
			   </div>
			</div>
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Facing</h2>
			      <select class="input-sm form-control input-s-sm inline">
											<option value="1">North </option>
											<option value="2">South </option>
											<option value="3">East</option>
											<option value="4">West</option>
											<option value="4">North-East</option>
											<option value="4">North-west</option>
											<option value="4">South-East</option>
											<option value="4">South-West</option>
					</select>
			   </div>
			</div>
			
			
			
        </fieldset>
		
		<fieldset>
            <div class="col-md-12">
				<legend>Pictures/Photos </legend>
			</div>
            <div class="ibox-content clearfix">
			   See  <a href="http://www.dropzonejs.com/#usage" target="_blank">photo upload plugin</a>
			</div>
        </fieldset>
		
        <p>
            <input id="SaveAccount" type="button" value="Submit form" />
        </p>
</form>
</div>