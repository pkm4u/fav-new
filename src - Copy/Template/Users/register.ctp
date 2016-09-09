<?php ?>
<div class="modal-content" id="userLoginForm">
 
    <div style="display:none;">
      <input type="hidden" value="POST" name="_method">
    </div>
    <div class="modal-header">
      <button class="close" type="button" ng-click="cancel()"><span aria-hidden="true">×</span></button>
      <h4 id="myModalLabel-1" class="modal-title">Sign Up</h4>
    </div>
    <div id="notification"></div>
    <div class="modal-body">
     
        <div class="row">
                <form role="form" action="{{base_url}}">
				 <fieldset>
				<div class="form-group">
                      <label>Name</label> 
                      <input type="text" maxlength="50" required placeholder="Enter Name" class="form-control" name="name" ng-model="name">
                       <div ng-show="alerts.name" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('name')">{{alerts.name}}</div>
                     </div>
                    <div class="form-group">
                      <label>Email</label> 
                      <input type="email" maxlength="50" required placeholder="Enter Email" class="form-control" name="email" ng-model="email">
                       <div ng-show="alerts.email" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('email')">{{alerts.email}}</div>
                     </div>
                     <div class="form-group"><label>Password</label><input type="password" required placeholder="Password" class="form-control" name="password" ng-model="password">
                       <div ng-show="alerts.password" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('password')">{{alerts.password}}</div>
                       </div>
					   <div>
					    <div class="form-group"><label>Mobile No.</label><select data-ng-options="o.name for o in options" data-ng-model="selectedOption"></select><input type="text" required placeholder="Mobile No." class="form-control" name="mobile" ng-model="mobile">
                       <div ng-show="alerts.phone" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('phone')">{{alerts.phone}}</div>
                       </div>
					    <div class="form-group">
						<label>I am</label>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default" ng-class="{active: currentVal == '4'}" ng-click="$scope.setusertype('4')">
								<input type="radio" value="4" ng-model="currentVal" name="type"></input>
								Buyer/Owner
							</label>
							<label class="btn btn-default" ng-class="{active: currentVal == '5'}" ng-click="$scope.setusertype('5')">
								<input type="radio" value="5" ng-model="currentVal" name="type"></input>
								Agent
							</label>
							<label class="btn btn-default" ng-class="{active: currentVal == '3'}" ng-click="$scope.setusertype('3')">
								<input type="radio" value="3" ng-model="currentVal" name="type"></input>
								Builder
							</label>
							<div ng-show="alerts.usertype" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('usertype')">{{alerts.usertype}}</div>
						</div>
  
				
					   <div>
						<button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" ng-click="userRegister();"><strong>SignUp</strong></button>
					</div>
					</fieldset>
                </form>
                </div>
		
      
       </div>
    <div class="modal-footer"> Have an account? <a ng-click="lopen('sm');" class="link" href="javascript:void(0)">Login</a> </div>

</div>
