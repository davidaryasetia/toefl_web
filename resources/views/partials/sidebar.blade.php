 <!-- Sidebar Start -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div>
         <div class="brand-logo d-flex align-items-center justify-content-center mt-2">
             <a href="./index.html" class="text-nowrap logo-img">
                 <img src="{{asset ('assets/images/logos/long-logo.png')}}" width="200" alt="" />
             </a>
             <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                 <i class="ti ti-x fs-8"></i>
             </div>
         </div>
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
             <ul id="sidebarnav">
                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">Home</span>
                 </li>
                 <li class="sidebar-item {{ Request::is('/')? '' : 'selected'}}">
                     <a class="sidebar-link" href="./" aria-expanded="false">
                         <span>
                             <i class="ti ti-layout-dashboard"></i>
                         </span>
                         <span class="hide-menu">Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">Data Master Toefl</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                         <span>
                             <i class="ti ti-file-text"></i>
                         </span>
                         <span class="hide-menu">Data</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">AUTH</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                         <span>
                            <i class="ti ti-user"></i>
                         </span>
                         <span class="hide-menu">Profile</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="/login" aria-expanded="false">
                         <span>
                             <i class="ti ti-logout "></i>
                         </span>
                         <span class="hide-menu">Logout</span>
                     </a>
                 </li>
                
             </ul>
             
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->
