   <body>
     <div class='loader'>
       <div class='spinner-grow text-primary' role='status'>
         <span class='sr-only'>Loading...</span>
       </div>
     </div>
     <div class="page-container">
       <div class="page-header">
         <nav class="navbar navbar-expand-lg d-flex justify-content-between">
           <div class="" id="navbarNav">
             <ul class="navbar-nav" id="leftNav">
               <li class="nav-item">
                 <a class="nav-link" id="sidebar-toggle" href="#"><i class="fa-solid fa-bars"></i></a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
               </li>
             </ul>
           </div>
           <div class="logo">
             <span class="logo-text">AirdropKu</span>
           </div>
           <div class="" id="headerNav">
             <ul class="navbar-nav">
               <li class="nav-item dropdown">
                 <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/images/avatars/profile-image-2.png" alt=""></a>
                 <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                   <a class="dropdown-item" href="<?php echo base_url(); ?>user/settings"><i data-feather="user"></i>Profile</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>user/settings"><i data-feather="settings"></i>Settings</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i data-feather="log-out"></i>Logout</a>
                 </div>
               </li>
             </ul>
           </div>
         </nav>
       </div>