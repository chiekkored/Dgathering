<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?=base_url();?>home">
  	<img src="<?=base_url();?>resources/images/logo-white.png" height="30" class="d-inline-block align-top" alt="">
  	<span class="font-weight-light text-white">
  		D'Gathering <b>MS</b>
  	</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <?php if ( "Administrator" == $this->session->userdata('SESS_ROLE')): ?>
      <div class="navbar-nav border-right">
        <div <?php if($this->uri->segment(1) === "cms") : ?>class="nav-item active"<?php endif; ?>>
          <a href="<?=base_url();?>cms" class="nav-link">
            <svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd"/>
            </svg> Admin</a>
        </div>
      </div>
      <?php endif; ?>
    	  <a type="button" class="btn btn-warning text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
    	    <i class="fa fa-user"></i> Account
    	  </a>
    	  <div class="dropdown-menu dropdown-menu-right">
    	    <!-- <a class="dropdown-item" href="#">Action</a>
    	    <a class="dropdown-item" href="#">Another action</a> -->
    	    <button class="dropdown-item" id="changePassword" data-user-id="<?= $this->session->userdata('SESS_USER_ID') ?>">Change Password</button>
    	    <div class="dropdown-divider"></div>
    	    <a href="<?=base_url();?>logout" class="dropdown-item text-danger" type="submit">
          <b><i class="fa fa-sign-out"></i> Logout</b></a>
    	  </div>
    </div>
  </div>
</nav>