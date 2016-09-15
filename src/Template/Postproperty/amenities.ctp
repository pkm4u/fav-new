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
			<legend>Amenities</legend>
            <div class="ibox-content amenities clearfix">
				<div class="col-md-3 pdallnone" ng-repeat="ameinity in amenities">
					<md-checkbox ng-checked="exists(ameinity.id, selectedAmenities)" ng-click="toggle(ameinity.id, selectedAmenities)">{{ameinity.name}} </md-checkbox>
				</div>
			</div>
            
			</div>

<div class="col-md-6">
    <md-button class="md-raised md-primary">Basic Information</md-button>
</div>            
<div class="col-md-6">
    <md-button class="md-raised md-primary pull-right">Next</md-button>
</div>