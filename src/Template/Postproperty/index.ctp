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
<form id="PostProperty" action="">
	<fieldset ng-if="basicInfo">
        <div class="col-md-12"><legend>Basic Information</legend></div>
        <div class="col-md-12">
        <div class="ibox-content">
        <h2>List Name</h2>
        <input class="form-control" type="text" ng-model="title" required>
        </div>
        </div>
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
        
        <div class="col-md-6 pull-right"> 
        <md-button class="md-raised md-primary pull-right" ng-click="saveInfo()">Next</md-button>
        </div>
        </fieldset>
    <fieldset ng-if="amenit">
        <div class="col-md-12">
        <legend>Amenities</legend>
        <div class="ibox-content amenities clearfix">
            <div class="col-md-3 pdallnone" ng-repeat="ameinity in amenities">
                <md-checkbox ng-checked="exists(ameinity.id, selectedAmenities)" ng-click="toggle(ameinity.id, selectedAmenities)">{{ameinity.name}} </md-checkbox>
            </div>
        </div>
        
        </div>
        
        <div class="col-md-6">
        <md-button class="md-raised md-primary" ng-click="propmenu('BasicInfo');">Basic Information</md-button>
        </div>            
        <div class="col-md-6">
        <md-button class="md-raised md-primary pull-right" ng-click="saveAmenities();">Next</md-button>
        </div>
    </fieldset>
    <fieldset ng-if="propDetail">
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
        
        <div class="col-md-6">
        <md-button class="md-raised md-primary" ng-click="propmenu('Amenities');"> Amenities</md-button>
        </div>            
        <div class="col-md-6">
        <md-button class="md-raised md-primary pull-right" ng-click="saveDetails();">Next</md-button>
        </div>
    </fieldset>
    <fieldset ng-if="compAddr">
        <div class="col-md-12">
            <legend>Complete Address </legend>
            </div>
                        
        <div class="col-md-6">
        <div class="ibox-content clearfix">
        <h2>Search by Project Name</h2>
        
        <md-autocomplete
          ng-disabled="isDisabled"
          md-no-cache="noCache"
          md-selected-item="selectedItem"
          md-search-text="searchText"
          md-selected-item-change="selectedItemChange(item)"
          md-items="item in querySearch(searchText)"
          md-item-text="item.display"
          md-min-length="0"
          placeholder="Enter Project Name">
        <md-item-template>
          <span md-highlight-text="searchText" md-highlight-flags="^i">{{item.display}}</span>
        </md-item-template>
        <md-not-found>
          No project matching "{{ctrl.searchText}}" were found.
        </md-not-found>
      </md-autocomplete>
        
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
        <ng-map zoom="{{mzoom}}" center="[{{lat}}, {{long}}]">
        <marker position="{{lat}}, {{long}}" ></marker>
        </ng-map>
        </div>
        </div>
        
        <div class="col-md-6">
        <md-button class="md-raised md-primary" ng-click="propmenu('PropertyDetail');"> Property Detail</md-button>
        </div>            
        <div class="col-md-6">
        <md-button class="md-raised md-primary pull-right" ng-click="saveAddress();">Next</md-button>
        </div>
    </fieldset>
    <fieldset ng-if="pricing">
        <div class="col-md-12">
            <legend>Pricing </legend>
            </div>
            
            
        <div class="col-md-6">
        <div class="ibox-content">
          <h2>Total Floors in Building</h2>
          
          <md-select ng-model="floors" placeholder="Select Floor">
            <md-option ng-repeat="floor in totalFloors" ng-value="floor">{{floor}}</md-option>
          </md-select>
          
        </div>
        </div>
        <div class="col-md-6">
        <div class="ibox-content">
          <h2>Property on Floor</h2>
          <md-select ng-model="floorOn" placeholder="Select Floor On">
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
         
           <md-radio-group ng-model="priceStatus">
        <div class="col-md-6">
        <md-radio-button value="Negotiable" class="md-primary">Negotiable</md-radio-button>
        </div>
        <div class="col-md-6">
        <md-radio-button value="Unnegotiable" class="md-primary"> Unnegotiable </md-radio-button>
        </div>
        
        </md-radio-group>
            
        
        </div>
        </div>
        
        <div class="col-md-12">
        <div class="ibox-content clearfix">
          <h2>Price Includes </h2>
          <div class="col-md-3 pdallnone">
          <md-checkbox ng-checked="exists('Parking', selectedPriceInc)" ng-click="toggle('Parking', selectedPriceInc)">Parking </md-checkbox> 
            
        </div>
        <div class="col-md-3 pdallnone">
        <md-checkbox ng-checked="exists('PLC', selectedPriceInc)" ng-click="toggle('PLC', selectedPriceInc)">PLC </md-checkbox> 
            
        </div>
        <div class="col-md-3 pdallnone">
        <md-checkbox ng-checked="exists('EDC/IDC', selectedPriceInc)" ng-click="toggle('EDC/IDC', selectedPriceInc)">EDC/IDC </md-checkbox> 
            
        </div>
        <div class="col-md-3 pdallnone">
        <md-checkbox ng-checked="exists('Registration', selectedPriceInc)" ng-click="toggle('Registration', selectedPriceInc)">Registration </md-checkbox> 
            
        </div>
        
        </div>
        </div>
        <div class="col-md-6">
        <div class="ibox-content">
          <h2>Age of property/construction</h2>
          <md-select ng-model="ageOfProp" placeholder="Select Property Age">
            <md-option ng-value="1">Less Than 1 year</md-option>
            <md-option ng-value="2">1-3 year</md-option>
            <md-option ng-value="3">4-5 year</md-option>
            <md-option ng-value="4">6-10 year</md-option>
            <md-option ng-value="5">11-20 year</md-option>
          </md-select>
          
          
        </div>
        </div>
        <div class="col-md-6">
        <div class="ibox-content">
          <h2>Facing</h2>
          <md-select ng-model="propFacing" placeholder="Select Facing Type">
            <md-option ng-value="1">North</md-option>
            <md-option ng-value="2">South</md-option>
            <md-option ng-value="3">East</md-option>
            <md-option ng-value="4">West</md-option>
            <md-option ng-value="5">North-East</md-option>
            <md-option ng-value="6">North-west</md-option>
            <md-option ng-value="7">South-East</md-option>
            <md-option ng-value="8">South-West</md-option>
          </md-select>
          
        </div>
        </div>
        
        <div class="col-md-6">
        <md-button class="md-raised md-primary" ng-click="propmenu('CompleteAddress');"> Complete Address</md-button>
        </div>            
        <div class="col-md-6">
        <md-button class="md-raised md-primary pull-right" ng-click="savePricing();">Next</md-button>
        </div>
    </fieldset>
    <fieldset ng-if="photos">
        <div class="col-md-12">
        <legend>Pictures/Photos </legend>
        </div>
        <div class="col-md-6">
        <md-button class="md-raised md-primary" ng-click="propmenu('Pricing');"> Pricing</md-button>
        </div>
        <div class="col-md-6">
        <md-button class="md-raised md-primary pull-right" ng-click="savePhotos();">Finished</md-button>
        </div>
    </fieldset>
</form>
</div>