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
//
?>
<div class="col-md-12"><legend >Basic Information</legend></div>
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
<md-button class="md-raised md-primary pull-right" ng-click="next('amenities')">Next</md-button>
</div>