<?php ?>
<div class="modal-content" id="userLoginForm">
 
    <div style="display:none;">
      <input type="hidden" value="POST" name="_method">
    </div>
    <div class="modal-header">
      <button class="close" type="button" ng-click="cancel()"><span aria-hidden="true">×</span></button>
      <h4 id="myModalLabel-1" class="modal-title">Verify Mobile No.</h4>
    </div>
    <div id="notification"></div>
    <div class="modal-body">
	{{flash}}
        <div class="row">
		<p>Verification link was sent to your email {{actiemail}} Go to gmail.com (Optional)</p>
		<p>Enter verification code sent to your mobile no. {{actiphone}}</p>
                <form role="form" action="{{base_url}}">
				 <fieldset>
				<div class="form-group">
                      <label>Enter Code*</label> 
                      <input type="text" maxlength="50" required  class="form-control" name="code" ng-model="code">
					  <span ng-show="!code.length" ng-class="danger">This field is required.</span>
                       <div ng-show="alerts.code" uib-alert ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert('code')">{{alerts.code}}</div>
                     </div>
					
                   
						<div>
						<button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" ng-click="userActivate(<?php echo $user_id;?>);"><strong>Verify</strong></button>
					</div>
					   
					</fieldset>
                </form>
                </div>
		
      
       </div>
    

</div>
