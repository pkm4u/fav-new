<?php ?>
<div class="modal-content" id="userLoginForm">
  <form accept-charset="utf-8" method="post" action="{{base_url}}">
    <div style="display:none;">
      <input type="hidden" value="POST" name="_method">
    </div>
    <div class="modal-header">
      <button class="close" type="button" ng-click="cancel()"><span aria-hidden="true">×</span></button>
      <h4 id="myModalLabel-1" class="modal-title">Reset Password</h4>
    </div>
    <div id="notification">
    <div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert($index)">{{alert}}</div>
    </div>
    <?php if($this->request->session()->read('resetAuth')){ ?>
    <div class="modal-body">
      <fieldset>
        <div class="form-group">
          <input type="password" maxlength="50" required placeholder="New Password" class="form-control" name="username" ng-model="newpassword">
        </div>
        <div class="form-group">
          <input type="password" maxlength="50" required placeholder="Re-New Password" class="form-control" name="username" ng-model="renewpassword">
        </div>
      </fieldset>
      <button ng-click="setnewpassword();" class="btn btn-primary btn-block" type="button" id="loginBtn">Set New Password</button>
       </div>
       
    <div class="modal-footer"></div>
    <?php }else{?>
    
    <div class="modal-body">
      <fieldset>
        <div class="form-group">
          <input type="text" maxlength="50" required placeholder="User Name/Email" class="form-control" name="username" ng-model="username">
        </div>
      </fieldset>
      <button ng-click="resetpassword();" class="btn btn-primary btn-block" type="button" id="loginBtn">Reset</button>
       </div>
       
    <div class="modal-footer"> Have an account? <a ng-click="lopen('sm');" class="link" href="javascript:void(0)">Login</a> </div>
    <?php }?>
  </form>
</div>
