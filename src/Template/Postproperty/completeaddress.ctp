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
  <ng-map zoom="{{mzoom}}" center="[{{lat}}, {{long}}]">
  <marker position="{{lat}}, {{long}}" ></marker>
  </ng-map>
</div>
</div>

<div class="col-md-6">
    <md-button class="md-raised md-primary"> Property Detail</md-button>
</div>            
<div class="col-md-6">
    <md-button class="md-raised md-primary pull-right">Next</md-button>
</div>