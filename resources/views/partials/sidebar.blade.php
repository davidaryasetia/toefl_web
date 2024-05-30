 <!-- Sidebar Start -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div>
         <div class="brand-logo d-flex align-items-center justify-content-center mt-2">
             <a href="./index.html" class="text-nowrap logo-img">
                 <img src="{{ asset('assets/images/logos/long-logo.png') }}" width="200" alt="" />
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
                 <li class="sidebar-item">
                     <a class="sidebar-link {{ Request::is('/dashboard') ? 'active' : '' }}" href="/dashboard"
                         aria-expanded="false">
                         <span>
                             <i class="ti ti-layout-dashboard"></i>
                         </span>
                         <span class="hide-menu">Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">Data Test Toefl</span>
                 </li>
                 <li class="sidebar-item ">
                     <a class="sidebar-link {{ Request::is('PaketSoal*') ? 'active' : '' }}" href="/PaketSoal"
                         aria-expanded="false">
                         <span>
                             <i class="ti ti-file-text"></i>
                         </span>
                         <span class="hide-menu">Question Packet</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link {{ Request::is('DataSoal*') ? 'active' : '' }}" href="/DataSoal"
                         aria-expanded="false">
                         <span>
                             <i class="ti ti-clipboard-text"></i>
                         </span>
                         <span class="hide-menu">Test Question</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link {{ Request::is('HistoryTest*') ? 'active' : '' }}" href="/HistoryTest"
                         aria-expanded="false">
                         <span>
                             <i class="ti ti-history"></i>
                         </span>
                         <span class="hide-menu">History Test</span>
                     </a>
                 </li>

                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">Data Learn Toefl</span>
                 </li>
                 <li class="sidebar-item ">
                     <a class="sidebar-link {{ Request::is('StudyMaterials*') ? 'active' : '' }}" href="/StudyMaterials"
                         aria-expanded="false">
                         <span>
                            <i class="ti ti-notebook"></i>
                         </span>
                         <span class="hide-menu">Study Matery</span>
                     </a>
                 </li>
                 <li class="sidebar-item ">
                     <a class="sidebar-link {{ Request::is('LearnQuestion*') ? 'active' : '' }}" href="/LearnQuestion"
                         aria-expanded="false">
                         <span>
                             <i class="ti ti-vocabulary"></i>
                         </span>
                         <span class="hide-menu">Learn Question</span>
                     </a>
                 </li>

                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">AUTH</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link {{ Request::is('DataUser*') ? 'active' : '' }}" href="/DataUser"
                         aria-expanded="false">
                         <span>
                             <i class="ti ti-users-group"></i>
                         </span>
                         <span class="hide-menu">Data User</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link {{ Request::is('Profile*') ? 'active' : '' }}" href="/Profile"
                         aria-expanded="false">
                         <span>
                             <i class="ti ti-user"></i>
                         </span>
                         <span class="hide-menu">Profile</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="#" aria-expanded="false"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <span>
                             <i class="ti ti-logout "></i>
                         </span>
                         <span class="hide-menu">Logout</span>
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 </li>
             </ul>

         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->
