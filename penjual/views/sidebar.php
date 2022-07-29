<aside class="sidebar">
    <a href="#" class="sidebar-logo">
        <div class="d-flex justify-content-start align-items-center">
            <img src="./../asset/img/logo.png" alt="logo-img" width="180px">
        </div>

        <button id="toggle-navbar" onclick="toggleNavbar()">
            <img src="./assets/img/global/navbar-times.svg" alt="">
        </button>
    </a>

    <h5 class="sidebar-title">Menu Admin</h5>

    <a href="index.php" class="sidebar-item <?= $page === 1 ? 'active' : '' ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span>Dashboard</span>
    </a>

    <a href="profil.php" class="sidebar-item <?= $page === 2 ? 'active' : '' ?>">
        <!-- <img src="./assets/img/global/users.svg" alt=""> -->

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span>Profil</span>
    </a>

    <a href="produk.php" class="sidebar-item <?= $page === 3 ? 'active' : '' ?>">
        <!-- <img src="./assets/img/global/box.svg" alt=""> -->
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 16V8C20.9996 7.64927 20.9071 7.30481 20.7315 7.00116C20.556 6.69751 20.3037 6.44536 20 6.27L13 2.27C12.696 2.09446 12.3511 2.00205 12 2.00205C11.6489 2.00205 11.304 2.09446 11 2.27L4 6.27C3.69626 6.44536 3.44398 6.69751 3.26846 7.00116C3.09294 7.30481 3.00036 7.64927 3 8V16C3.00036 16.3507 3.09294 16.6952 3.26846 16.9988C3.44398 17.3025 3.69626 17.5546 4 17.73L11 21.73C11.304 21.9055 11.6489 21.9979 12 21.9979C12.3511 21.9979 12.696 21.9055 13 21.73L20 17.73C20.3037 17.5546 20.556 17.3025 20.7315 16.9988C20.9071 16.6952 20.9996 16.3507 21 16Z" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.27002 6.96L12 12.01L20.73 6.96" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 22.08V12" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span>Produk</span>
    </a>

    <a href="transaksi-pending.php" class="sidebar-item <?= $page === 4 ? 'active' : '' ?>">
        <!-- <img src="./assets/img/global/dollar-sign.svg" alt=""> -->
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 1V23" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span>Transaksi Pending</span>
    </a>

    <a href="transaksi-verif.php" class="sidebar-item <?= $page === 5 ? 'active' : '' ?>">
        <!-- <img src="./assets/img/global/dollar-sign.svg" alt=""> -->
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 1V23" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span>Transaksi Verifikasi</span>
    </a>

    <a href="transaksi-pengiriman.php" class="sidebar-item <?= $page === 6 ? 'active' : '' ?>">
        <!-- <img src="./assets/img/global/gift.svg" alt=""> -->
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 12V22H4V12" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M22 7H2V12H22V7Z" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 22V7" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 7H16.5C17.163 7 17.7989 6.73661 18.2678 6.26777C18.7366 5.79893 19 5.16304 19 4.5C19 3.83696 18.7366 3.20107 18.2678 2.73223C17.7989 2.26339 17.163 2 16.5 2C13 2 12 7 12 7Z" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 7H7.5C6.83696 7 6.20107 6.73661 5.73223 6.26777C5.26339 5.79893 5 5.16304 5 4.5C5 3.83696 5.26339 3.20107 5.73223 2.73223C6.20107 2.26339 6.83696 2 7.5 2C11 2 12 7 12 7Z" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span>Pengiriman</span>
    </a>

    <a href="laporan-transaksi.php" class="sidebar-item <?= $page === 7 ? 'active' : '' ?>">
        <!-- <img src="./assets/img/global/dollar-sign.svg" alt=""> -->
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 1V23" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span>Laporan</span>
    </a>

    <a href="logout.php" class="sidebar-item sidebar-item-hover">
        <!-- <img src="./assets/img/global/log-out.svg" alt=""> -->

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 17L21 12L16 7" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M21 12H9" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span>Logout</span>
    </a>

</aside>