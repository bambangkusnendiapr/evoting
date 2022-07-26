<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <a href="#" class="navbar-brand ml-auto">
        <img src="{{ asset('adminlte/voting.png') }}" style="width: 30px; height: 30px" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"> E-VOTING</span>
      </a>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
       
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">My Profile</span>
                <div class="dropdown-divider"></div>
                   @if (\Auth::user()->photo == null)
                        <center><img src="https://cdn.iconscout.com/icon/free/png-512/avatar-372-456324.png" width="50%" alt=""></center>
                   @else
                        <center><img src="{{ url('uploads/', \Auth::user()->photo) }}" width="30%" style="border-radius: 50%" alt=""><center>
                   @endif
                    <p class="text-center">{{ \Auth::user()->name }}</p>
                <div class="dropdown-divider"></div>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ url('profile') }}" class="dropdown-item dropdown-footer"> <i class="fa fa-list"></i> Detail</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/keluar') }}" class="dropdown-item dropdown-footer" onclick="return confirm('Apa anda yakin ingin keluar?')"> <i class="fa fa-arrow-right"></i> Logout</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->