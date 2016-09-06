<?php ?>
<div class="modal-content" id="userLoginForm">
  <form accept-charset="utf-8" method="post" id="loginform" action="{{base_url}}">
    <div class="modal-header">
      <button class="close" type="button" ng-click="cancel()"><span aria-hidden="true">×</span></button>
      <h4 id="myModalLabel-1" class="modal-title">Sign In</h4>
    </div>
    <div id="notification">
    <div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alerttype || 'danger')" close="closeAlert($index)">{{alert}}</div>
    </div>
    <div class="modal-body">
      <fieldset>
        <div class="form-group">
          <input type="text" id="ULoginUsername" maxlength="50" required placeholder="User Name" class="form-control" name="username" ng-model="username">
        </div>
        <div class="form-group">
          <input type="password" id="ULoginPassword" required placeholder="Password" class="form-control" name="password" ng-model="password">
        </div>
      </fieldset>
      <button ng-click="userLogin();" class="btn btn-primary btn-block" type="button" id="loginBtn">Login</button>
      Forgot Password ? <a ng-click="forgotpass('sm')" class="link" href="javascript:void(0)">Click here</a> </div>
    <div class="modal-footer"> Don't have an account? <a ng-click="ropen('sm');" class="link" href="javascript:void(0)">Register</a> </div>
  </form>
</div>
