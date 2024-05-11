<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="flex-grow-1 me-3">
                        <span class="fw-semibold d-block" id="navbar-username"></span>
                        <script>
                            const access_token = '{{ session('access_token') }}';
                            const idUser = '{{session('idUser')}}'
                            fetch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users?id=eq.'+idUser, {
                                    method: 'GET',
                                    headers: {
                                        'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                                        'Authorization': 'Bearer ' + access_token,
                                        'content-type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    const username = data[0].name;
                                    const admin = data[0].is_admin;
                                    const navbarUsername = document.getElementById('navbar-username');
                                    const navbarStatus = document.getElementById('navbar-status');
                                    navbarUsername.textContent = username;
                                    
                                    // status admin 
                                    if(admin){
                                        navbarStatus.textContent = 'Admin';
                                    } else {
                                        navbarStatus.textContent = 'User';
                                    }
                                })
                                .catch(error => {
                                    console.error('Error', error);
                                });
                        </script>

                        <small class="text-muted" id="navbar-status"></small>
                    </div>
                    <span>
                        <i class="ti ti-chevron-down" style="font-size: 16px"></i>
                    </span>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="/Profile" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="./authentication-login.html"
                                class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->

{{-- Fetch Data Username --}}
