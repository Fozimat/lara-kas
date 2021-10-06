<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="{{ request()->is('pemasukan*') ? 'active' : '' }}">
            <a href="{{ route('pemasukan.index') }}">
                <i class="material-icons">monetization_on</i>
                <span>Kas Masuk</span>
            </a>
        </li>
        <li class="{{ request()->is('pengeluaran*') ? 'active' : '' }}">
            <a href="{{ route('pengeluaran.index') }}">
                <i class="material-icons">layers</i>
                <span>Kas Keluar</span>
            </a>
        </li>

        <li class="header">LABELS</li>

        <li class="{{ request()->is('laporan*') ? 'active' : '' }}">
            <a href="{{ route('laporan') }}">
                <i class="material-icons">print</i>
                <span>Cetak Laporan</span>
            </a>
        </li>
        <li class="header">SETTINGS</li>
        <li>
            <a href="#">
                <i class="material-icons">person</i>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="material-icons">subdirectory_arrow_right</i>
                <span>Logout</span>
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>