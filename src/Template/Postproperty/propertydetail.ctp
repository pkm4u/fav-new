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
    <md-button class="md-raised md-primary"> Amenities</md-button>
</div>            
<div class="col-md-6">
    <md-button class="md-raised md-primary pull-right">Next</md-button>
</div>