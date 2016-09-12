<?php $loguser = $this->request->session()->read('Auth.User');?>
<div class="row">
  <div class="col-sm-6">
  <h3>Buy Property</h3>
  <ul>
  <li><p>Property Search</p>
  <p>Search Over 1000+ Properties</p> <a href ="www.favista.com">Search here</a>
  </li>
  
  <li>
  <p>Get Notified</p>
  <p>Set Preferences for your matching properties</p><a href="<?php echo $this->request->webroot;?>/users/set_preference/<?php echo $loguser['id'];?>" class="btn btn-default" >Set your preference</a>
  </li>
  
  </ul>
  
  
  
  </div>
 </div>