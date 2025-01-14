<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo-light.svg') }}" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pages.dosen.dashboard') }}" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pages.dosen.skp') }}" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Rencana SKP</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pages.dosen.realisasi') }}" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Realisasi SKP</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pages.dosen.arsipdokumen')}}" aria-expanded="false">
                <span>
                    <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Arsip SKP</span>
                </a>
              </li>
            
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Log Out</span>
                </a>
              </li>
        
        
            </ul>
     
          </nav>
    </div>
</aside>