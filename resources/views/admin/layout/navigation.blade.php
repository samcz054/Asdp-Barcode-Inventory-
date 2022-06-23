<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #252525">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="" style="margin-top: 40px; margin-bottom: 40px;">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{url('backend/img/asdp.svg')}}" alt="" style="width: 100%;">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">asdp</div> --}}
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
        <a class="nav-link" href="{{url('/admin')}}">
            <i style="color: #e64614" class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dasboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
    
    <!-- Heading Menu Utama -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!--Nav Gudang -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('gudang.index')}}">
            <i style="color: #e64614" class="fas fa-fw fa-table"></i>
            <span>Gudang</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Log Page -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#histori" aria-expanded="true" aria-controls="histori">
            <i style="color: #e64614" class="fas fa-fw fa fa-users"></i>
            <span>Riwayat</span>
        </a>

        <div id="histori" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Log:</h6>
                <a class="collapse-item" href="#">Peminjaman</a>
                <a class="collapse-item" href="#">Pengembalian</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
