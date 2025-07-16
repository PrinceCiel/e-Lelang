
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span class="text-primary">
                  <img src="{{ asset('icon/logo.png') }}" alt="logo" class="logo-img" style="padding: 10px 0;max-width: 150px;">
                </span>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
            </a>
          </div>

          <div class="menu-divider mt-0"></div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ Route::is('backend.home') ? 'active' : '' }} open">
              <a href="{{ route('backend.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
              </a>
            </li>
            <li class="menu-item {{ Route::is('backend.kategori.index') ? 'active' : '' }} {{ Route::is('backend.kategori.create') ? 'active' : '' }} {{ Route::is('backend.kategori.edit') ? 'active' : '' }} open">
              <a href="{{ route('backend.kategori.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Kategori Barang</div>
              </a>
            </li>
            <li class="menu-item {{ Route::is('backend.barang.index') ? 'active' : '' }} {{ Route::is('backend.barang.create') ? 'active' : '' }} {{ Route::is('backend.barang.edit') ? 'active' : '' }} open">
              <a href="{{ route('backend.barang.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Barang</div>
              </a>
            </li>
            <li class="menu-item {{ Route::is('backend.lelang.index') ? 'active' : '' }} {{ Route::is('backend.lelang.create') ? 'active' : '' }} {{ Route::is('backend.lelang.edit') ? 'active' : '' }} open">
              <a href="{{ route('backend.lelang.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Lelang</div>
              </a>
            </li>
            <li class="menu-item {{ Route::is('backend.bid.index') ? 'active' : '' }} open">
              <a href="{{ route('backend.bid.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Review Bid</div>
              </a>
            </li>
            <li class="menu-item {{ Route::is('backend.pemenang') ? 'active' : '' }} open">
              <a href="{{ route('backend.pemenang') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Pemenang</div>
              </a>
            </li>
            <li class="menu-item {{ Route::is('backend.struk.index') ? 'active' : '' }} open">
              <a href="{{ route('backend.struk.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Struk</div>
              </a>
            </li>
          </ul>
        </aside>