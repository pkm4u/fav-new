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
                                    <div class="form-group">
                                    <label>Email</label> 
                                    <input type="email" maxlength="50" required placeholder="Enter Email" class="form-control" name="username" ng-model="username">
                                    <div ng-show="alerts.email" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('email')">{{alerts.email}}</div>
                                    </div>
                                    <div class="form-group"><label>Password</label><input type="password" required placeholder="Password" class="form-control" name="password" ng-model="password">
                                     <div ng-show="alerts.password" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('password')">{{alerts.password}}</div>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" ng-click="userLogin();"><strong>Log in</strong></button>
                                        <label class=""> 
<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>									
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

		  

	  



