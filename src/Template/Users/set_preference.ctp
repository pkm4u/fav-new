<div id="page-wrapper" style="min-height: 282px;">
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12 ">
                <h1 class="page-header">Set Your Property Preferences</h1>
					<?php echo $this->Form->create('UserPreference', ['context' => ['validator' => 'default']]);?>
					<h4>Set Notification Settings</h4>
					<div class="col-md-12">
						<div class="ibox-content">
							<h5>Notification Name :</h5>
							<input type="text" maxlength="50" required class="form-control" name="alert_name" ng-model="alert_name">
						</div>
					</div>
					<div class="col-md-12">
						<div class="ibox-content">
							<h5> Name :</h5>
							<input type="text" maxlength="50" required class="form-control" placeholder="name" name="name" ng-model="name">
						</div>
					</div>
					<div class="col-md-12">
						<div class="ibox-content">
							<h5>Email :</h5>
							<input type="text" maxlength="50" required class="form-control" placeholder="email" name="email" ng-model="email">
						</div>
					</div>
					<div class="col-md-12">
						<div class="ibox-content">
							<h5>Notification Repetition :</h5>
								<md-radio-group ng-model="alert_time">

								<md-radio-button value="1" class="md-primary">Daily</md-radio-button>
								<md-radio-button value="2"> Weekly </md-radio-button>
								<md-radio-button value="3"> Twice a month </md-radio-button>
								<md-radio-button value="4"> Monthly </md-radio-button>

								</md-radio-group> 
						</div>
					</div>
					<div class="col-md-12">
						<div class="ibox-content">
							<h5>Notification on Phone :</h5>
								<md-radio-group ng-model="on_phone">

								<md-radio-button value="1" class="md-primary">Yes</md-radio-button>
								<md-radio-button value="2"> No </md-radio-button>
								

								</md-radio-group> 
						</div>
					</div>
					<h4>Set Property Preference</h4>
					 <div class="col-md-12"> 
						<div class="ibox-content">
							<h5>Property Type :</h5>
								<md-radio-group ng-model="propType">

								<md-radio-button value="1" class="md-primary">Residential</md-radio-button>
								<md-radio-button value="2"> Commercial </md-radio-button>
								

								</md-radio-group>      
						</div>
				</div>
				<div class="col-md-12"> 
						<div class="ibox-content">
							<h5>Looking To :</h5>
							<md-select ng-model="purchtype" placeholder="Select For">
						  
							<md-option ng-value="1">Buy</md-option>
							<md-option ng-value="2">Rent</md-option>
							
						  </md-select>       
						</div>
				</div>
				<div class="col-md-12">
                <div class="ibox-content">
                    <h5>Property Type :</h5>
                    <md-select ng-model="resiPropType" placeholder="Select Type" ng-if="propType == 1">
                    <md-option ng-value="1">Apartment</md-option>
                    <md-option ng-value="2">Independent/Builder floor</md-option>
                    <md-option ng-value="3">Villa</md-option>
                    <md-option ng-value="4">Independent house</md-option>
					<md-option ng-value="5">Studio Apartment</md-option>
                    <md-option ng-value="6">Farm House</md-option>
                  </md-select> 
                
                    <md-select ng-model="comPropType" placeholder="Select Type" ng-if="propType == 2">
                    <md-option ng-value="1">Commercial Office/Space</md-option>
                    <md-option ng-value="2">Commercial Shops</md-option>
                    <md-option ng-value="3">Commercial Showrooms</md-option>
                    <md-option ng-value="4">Office Space</md-option>
					
                  </md-select> 
                </div>
            </div>
			<div class="col-md-12">
                <div class="ibox-content">
                    <h5>Budget :</h5>
                    <md-select ng-model="min" placeholder="Min">
                    <md-option ng-value="1">Below 5 Lacs</md-option>
                    <md-option ng-value="2">5 Lacs</md-option>
                    <md-option ng-value="3">10 Lacs</md-option>
                    <md-option ng-value="4">15 Lacs</md-option>
					<md-option ng-value="5">20 Lacs</md-option>
                    <md-option ng-value="6">25 Lacs</md-option>
					<md-option ng-value="7">30 Lacs</md-option>
					<md-option ng-value="8">40 Lacs</md-option>
					<md-option ng-value="9">50 Lacs</md-option>
					<md-option ng-value="10">60 Lacs</md-option>
					<md-option ng-value="11">70 Lacs</md-option>
					<md-option ng-value="12">75 Lacs</md-option>
					<md-option ng-value="13">90 Lacs</md-option>
					<md-option ng-value="14">1 Crores</md-option>
					<md-option ng-value="15">1.5 Crores</md-option>
					<md-option ng-value="16">2 Crores</md-option>
					<md-option ng-value="17">3 Crores</md-option>
					<md-option ng-value="18">5 Crores</md-option>
					<md-option ng-value="19">10 Crores</md-option>
					<md-option ng-value="20">15 Crores</md-option>
					<md-option ng-value="21">25 Crores</md-option>
					<md-option ng-value="22">30 Crores</md-option>
					<md-option ng-value="23">35 Crores</md-option>
					<md-option ng-value="24">40 Crores</md-option>
					<md-option ng-value="25">50 Crores</md-option>
					<md-option ng-value="26">60 Crores</md-option>
					<md-option ng-value="27">70 Crores</md-option>
					<md-option ng-value="28">80 Crores</md-option>
					<md-option ng-value="29">90 Crores</md-option>
					<md-option ng-value="30">100 Crores</md-option>
					<md-option ng-value="31">100+ Crores</md-option>
                  </md-select> 
				  
				   <h5>To :</h5>
                    <md-select ng-model="max" placeholder="Max">
                    <md-option ng-value="1">Below 5 Lacs</md-option>
                    <md-option ng-value="2">5 Lacs</md-option>
                    <md-option ng-value="3">10 Lacs</md-option>
                    <md-option ng-value="4">15 Lacs</md-option>
					<md-option ng-value="5">20 Lacs</md-option>
                    <md-option ng-value="6">25 Lacs</md-option>
					<md-option ng-value="7">30 Lacs</md-option>
					<md-option ng-value="8">40 Lacs</md-option>
					<md-option ng-value="9">50 Lacs</md-option>
					<md-option ng-value="10">60 Lacs</md-option>
					<md-option ng-value="11">70 Lacs</md-option>
					<md-option ng-value="12">75 Lacs</md-option>
					<md-option ng-value="13">90 Lacs</md-option>
					<md-option ng-value="14">1 Crores</md-option>
					<md-option ng-value="15">1.5 Crores</md-option>
					<md-option ng-value="16">2 Crores</md-option>
					<md-option ng-value="17">3 Crores</md-option>
					<md-option ng-value="18">5 Crores</md-option>
					<md-option ng-value="19">10 Crores</md-option>
					<md-option ng-value="20">15 Crores</md-option>
					<md-option ng-value="21">25 Crores</md-option>
					<md-option ng-value="22">30 Crores</md-option>
					<md-option ng-value="23">35 Crores</md-option>
					<md-option ng-value="24">40 Crores</md-option>
					<md-option ng-value="25">50 Crores</md-option>
					<md-option ng-value="26">60 Crores</md-option>
					<md-option ng-value="27">70 Crores</md-option>
					<md-option ng-value="28">80 Crores</md-option>
					<md-option ng-value="29">90 Crores</md-option>
					<md-option ng-value="30">100 Crores</md-option>
					<md-option ng-value="31">100+ Crores</md-option>
                  </md-select> 
                
                   
                </div>
            </div>
		
			<div class="col-md-12">
                <div class="ibox-content">
                    <h5>Area :</h5>
                    <input type="text" maxlength="50" required placeholder="Min" class="form-control" name="min" ng-model="min_area">
                  <h5>To :</h5>
                    <input type="text" maxlength="50" required placeholder="Max" class="form-control" name="max" ng-model="max_area">
					<md-select ng-model="measured_in" placeholder="sqft">
                    <md-option ng-value="1">Sqft</md-option>
                    <md-option ng-value="2">Sq Yards</md-option>
                    <md-option ng-value="3">Acres</md-option>
                    <md-option ng-value="4">Hectares</md-option>
					
                  </md-select> 
                </div>
            </div>
               <div class="col-md-12">
                <div class="ibox-content">
                    <h5>Sale Type :</h5>
                     <md-checkbox ng-model="resale" aria-label="Checkbox 1">
						Resale
					  </md-checkbox>
					  <md-checkbox ng-model="booking" aria-label="Checkbox 1">
						New Booking
					  </md-checkbox>
                </div>
            </div>
			 <div class="col-md-12">
                <div class="ibox-content">
                    <h5>Property Availability :</h5>
                     <md-checkbox ng-model="ready" aria-label="Checkbox 1">
						Ready To Move In
					  </md-checkbox>
					  <md-checkbox ng-model="Construction" aria-label="Checkbox 1">
						Under Construction
					  </md-checkbox>
                </div>
            </div>
                   <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success">Set Alert</button>    
                    </div>    
                <?php echo $this->Form->end(); ?>
                  
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
  
</div>