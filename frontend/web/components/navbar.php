   <nav id="nav_top" class="NAV_all">
    <div class="nav-wrapper container AA_CC">
		  <a href="#" data-activates="slide-out" class="button-collapse nav_op_sid waves-effect waves-light"><i class="material-icons fa fa-bars"></i></a>
		<a href="" class="brand-logo">XCapital</a>

   

      <ul class="right hide-on-med-and-down">

 <?php  if(Yii::$app->user->isGuest){  ?>
        <li><a href="/site/signup" class="waves-effect waves-light btn btn_all btn_border nav_btn dont_beta">Join us now</a></li>
        <li><a href="/site/login" class="waves-effect waves-light btn btn_all nav_btn dont_beta">Login</a></li>
         <?php }else{ ?>
       <li><a href="/profile" class="waves-effect waves-light btn btn_all btn_border nav_btn dont_beta">Profile</a></li>
      <?php } ?>
      </ul>
     

    </div>
<!--	  <div class="nav_bg"></div>-->
 
  </nav>
 
<!--Side nav-->
  <ul id="slide-out" class="side-nav">
       	<a href="" class="brand-logo center">XCapital</a>
        <li><a href="#!" class="waves-effect waves-light dont_beta">Home</a></li>
        <li><a href="#!" class="waves-effect waves-light dont_beta">About us</a></li>
        <li><a href="#!" class="waves-effect waves-light dont_beta">FAQ</a></li>
        <li><a href="#!" class="waves-effect waves-light dont_beta">Contact us</a></li>
        <li><a href="#!" class="waves-effect waves-light dont_beta">Therms of service</a></li>
	    <li><div class="divider"></div></li> 
      

        <li><a href="/site/signup" class="waves-effect waves-light dont_beta">Регистрация</a></li>
        <li><a href="/site/login" class="waves-effect waves-light dont_beta">Вход</a></li>
       
  </ul>