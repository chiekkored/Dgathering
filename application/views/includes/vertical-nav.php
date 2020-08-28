<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-center text-muted">
        CMS
        <small class="font-italic">Version 1.0</small>
      </div>
      <div class="list-group list-group-flush">
        <a href="<?=base_url();?>cms" class="list-group-item list-group-item-action bg-light<?php if($this->uri->uri_string() === 'cms') : ?> list-active<?php endif; ?>">Dashboard
          <svg class="bi bi-grid-1x2-fill float-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
            <path d="M0 1a1 1 0 011-1h5a1 1 0 011 1v14a1 1 0 01-1 1H1a1 1 0 01-1-1V1zm9 0a1 1 0 011-1h5a1 1 0 011 1v5a1 1 0 01-1 1h-5a1 1 0 01-1-1V1zm0 9a1 1 0 011-1h5a1 1 0 011 1v5a1 1 0 01-1 1h-5a1 1 0 01-1-1v-5z"/>
          </svg></a>
        <a href="<?=base_url();?>cms/events" class="list-group-item list-group-item-action bg-light<?php if($this->uri->uri_string() === 'cms/events') : ?> list-active<?php endif; ?>">Events
          <svg class="bi bi-calendar-fill float-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 2a2 2 0 012-2h12a2 2 0 012 2H0z"/>
          <path fill-rule="evenodd" d="M0 3h16v11a2 2 0 01-2 2H2a2 2 0 01-2-2V3zm6.5 4a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
        </svg></a>
        <a href="<?=base_url();?>cms/users" class="list-group-item list-group-item-action bg-light<?php if($this->uri->uri_string() === 'cms/users') : ?> list-active<?php endif; ?>">Users
          <svg class="bi bi-people-fill float-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
        </svg></a>
        <a href="<?=base_url();?>cms/logs" class="list-group-item list-group-item-action bg-light<?php if($this->uri->uri_string() === 'cms/logs') : ?> list-active<?php endif; ?>">Logs
          <svg class="bi bi-person-lines-fill float-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7 1.5a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5zm-2-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm2 9a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
          </svg></a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="background-color: #ecf0f1;">

      <button class="navbar-toggler mt-3" id="menu-toggle"><h5><i class="fa fa-bars"></i> Admin Panel</h5></button>