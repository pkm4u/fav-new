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
                <md-select ng-model="proCity" md-on-open="loadCity()" placeholder="Select City">
                <md-option ng-repeat="city in cities" ng-value="city.id" ng-click="location(city.id,city.name)">
                  {{city.name}}
                </md-option>
              </md-select>
			</div>
			</div>
            <div class="col-md-6">
			   <div class="ibox-content">
				   <h2>Locality</h2>
                 <md-select ng-model="proLocality" placeholder="Select Locality">
                <md-option ng-repeat="location in locations" ng-value="location.name" >
                  {{location.name}}
                </md-option>
              </md-select>
			   </div>			
			</div>	
			<div class="col-md-6">
                <div class="ibox-content">
                    <h2>List Property For :</h2>
                    <md-select ng-model="propFor" placeholder="Select For">
                  
                    <md-option ng-value="1">Buy</md-option>
                    <md-option ng-value="2">Sell</md-option>
                    <md-option ng-value="3">Rent</md-option>
                  </md-select>       
                </div>
			</div>
			<div class="col-md-6">
                <div class="ibox-content">
                    <h2>Property Type :</h2>
                    <md-select ng-model="propType" placeholder="Select Type">
                    <md-option ng-value="1">Apartment</md-option>
                    <md-option ng-value="2">Independent/Builder floor</md-option>
                    <md-option ng-value="3">Villa</md-option>
                    <md-option ng-value="4">Independent house</md-option>
                  </md-select> 
                </div>
            </div>
			
           
        </fieldset>
		
        <fieldset>
            <div class="col-md-12">
			<legend>Amenities</legend>
            <div class="ibox-content amenities clearfix">
				<div class="col-md-3 pdallnone" ng-repeat="ameinity in amenities">
					<md-checkbox ng-checked="exists(ameinity.id, selectedAmenities)" ng-click="toggle(ameinity.id, selectedAmenities)">{{ameinity.name}} </md-checkbox>
				</div>
			</div>
            
			</div>
			<button type="button" class="btn btn-primery" ng-click="postProp();">Post</button>
        </fieldset>
        
        
        <fieldset>
		    <div class="col-md-12">
            <legend>Property Detail</legend>
            </div>
			<div class="col-md-6">
            <div class="ibox-content">
                <h2>Configuration :</h2>
                
                <md-select ng-model="propConfig" placeholder="Select Configuration">
                    <md-option ng-value="1">1 BHK</md-option>
                    <md-option ng-value="2">2 BHK</md-option>
                    <md-option ng-value="3">3 BHK</md-option>
                    <md-option ng-value="4">4 BHK</md-option>
                  </md-select> 
                
            </div>
			</div>
			<div class="col-md-6">
            <div class="ibox-content">
            <h2>No. of Bathrooms :</h2>
            <md-select ng-model="propBath" placeholder="Select Bathrooms">
            <md-option ng-value="1">1</md-option>
            <md-option ng-value="2">2</md-option>
            <md-option ng-value="3">3</md-option>
            <md-option ng-value="4">4</md-option>
            </md-select> 
            </div>
			</div>
			<div class="col-md-6">
            <div class="ibox-content">
                <h2>No. of Balconies :</h2>
             <md-select ng-model="propBalcony" placeholder="Select Balconies">
                <md-option ng-value="1">1</md-option>
                <md-option ng-value="2">2</md-option>
                <md-option ng-value="3">3</md-option>
                <md-option ng-value="4">4</md-option>
                <md-option ng-value="5">5</md-option>
            </md-select>
								
	</div>
			</div>
			<div class="col-md-6">
            <div class="ibox-content clearfix">
                <h2>Other Rooms</h2>
                <div class="col-md-4 pdallnone">
                   <md-checkbox ng-checked="exists('Study', selectedOtherRoom)" ng-click="toggle('Study', selectedOtherRoom)">Study </md-checkbox> 
                </div>
                <div class="col-md-4 pdallnone">
                   <md-checkbox ng-checked="exists('Servant', selectedOtherRoom)" ng-click="toggle('Servant', selectedOtherRoom)">Servant </md-checkbox> 
                </div>
                <div class="col-md-4 pdallnone">
                   <md-checkbox ng-checked="exists('Other', selectedOtherRoom)" ng-click="toggle('Other', selectedOtherRoom)">Other </md-checkbox> 
                </div>
			</div>
           
			</div>
			
			<div class="col-md-6">
            <div class="ibox-content">
                <h2>Furnishing</h2>
            <md-select ng-model="propFurnishing" placeholder="Select Furnishing Type">
                <md-option ng-value="1">Furnished</md-option>
                <md-option ng-value="2">Semi-Furnished</md-option>
                <md-option ng-value="3">Unfurnished</md-option>
            </md-select>
								
			</div>
			</div>
			<div class="col-md-6">
    <div class="ibox-content clearfix">
        <h2>Parking</h2>
            <md-radio-group ng-model="selectedParking">
                <div class="col-md-4 pdallnone">
                <md-radio-button value="Open" class="md-primary">Open</md-radio-button>
                </div>
                <div class="col-md-4 pdallnone">
                <md-radio-button value="Covered" class="md-primary"> Covered </md-radio-button>
                </div>
                <div class="col-md-4 pdallnone">
                <md-radio-button value="None" class="md-primary">None</md-radio-button>
                </div>
            </md-radio-group>
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
                  
                  <md-select ng-model="floors" placeholder="Select Type">
                    <md-option ng-repeat="floor in totalFloors" ng-value="floor">{{floor}}</md-option>
                  </md-select>
			   </div>
			</div>
			<div class="col-md-6">
			   <div class="ibox-content">
			      <h2>Property on Floor</h2>
                  <md-select ng-model="floorOn" placeholder="Select Type">
                    <md-option ng-repeat="flooron in []|floorOn:floors" ng-value="flooron">{{flooron}}</md-option>
                  </md-select>                  
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