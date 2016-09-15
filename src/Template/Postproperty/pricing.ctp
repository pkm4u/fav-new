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
    <md-button class="md-raised md-primary"> Property Detail</md-button>
</div>            
<div class="col-md-6">
    <md-button class="md-raised md-primary pull-right">Next</md-button>
</div>
			