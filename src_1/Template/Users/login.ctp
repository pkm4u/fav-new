<?php ?>
<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="btn close" data-dismiss="modal" aria-label="Close" ng-click="cancel()"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="login-modal">Login to your account</h4>
		  </div>
         
		  <div class="modal-body">
			<div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Sign in</h3>
                                <p>Sign in today for more expirience.</p>
                                <form role="form" action="{{base_url}}">
                                 <div ng-show="alerts.error" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('error')">{{alerts.error}}</div>
                                    <div class="form-group">
                                    <label>Email</label> 
                                    <input type="email" maxlength="50" required placeholder="Enter Email" class="form-control" name="email" ng-model="email">
                                    <div ng-show="alerts.email" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('email')">{{alerts.email}}</div>
                                    </div>
                                    <div class="form-group"><label>Password</label><input type="password" required placeholder="Password" class="form-control" name="password" ng-model="password">
                                     <div ng-show="alerts.password" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('password')">{{alerts.password}}</div>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" ng-click="userLogin();"><strong>Log in</strong></button>
                                        <label class=""> 
                                        <input type="checkbox" class="i-checks" ng-model="remember" >								
                                        Remember me </label>
                                    </div>
                                    
                                     Forgot Password ? <a ng-click="forgotpass('sm')" class="link" href="javascript:void(0)">Click here</a> 
                                </form>
                                </div>
                           
            <div class="col-sm-6"><h4>Not a member?</h4>
                                <p>You can create an account:</p>
                                <p class="text-center">
                                    <a href="" ng-click="ropen('sm');"><i class="fa fa-sign-in big-icon"></i></a>
                                </p>
                            </div>
                             </div>
           </div>
</div>

		  

	  



