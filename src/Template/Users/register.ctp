<?php ?>
<div class="modal-content" id="userLoginForm">
  <form accept-charset="utf-8" method="post" id="loginform" action="/wikki/">
    <div style="display:none;">
      <input type="hidden" value="POST" name="_method">
    </div>
    <div class="modal-header">
      <button class="close" type="button" ng-click="cancel()"><span aria-hidden="true">×</span></button>
      <h4 id="myModalLabel-1" class="modal-title">Sign Up</h4>
    </div>
    <div id="notification"></div>
    <div class="modal-body">
      <fieldset>
        <div class="form-group">
          <input type="text" id="ULoginUsername" maxlength="50" required placeholder="User Name" class="form-control" name="username">
        </div>
        <div class="form-group">
          <input type="password" id="ULoginPassword" required placeholder="Password" class="form-control" name="password">
        </div>
      </fieldset>
      <button onclick="return userLogin(this);" class="btn btn-primary btn-block" type="button" id="loginBtn">Register</button>
       </div>
    <div class="modal-footer"> Have an account? <a ng-click="lopen('sm');" class="link" href="javascript:void(0)">Login</a> </div>
  </form>
</div>
