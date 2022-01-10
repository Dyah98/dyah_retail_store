<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/produk"
                        aria-expanded="false">
                        <i class="fa fa-boxes" aria-hidden="true"></i>
                        <span class="hide-menu">Produk Toko</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/transaksi"
                        aria-expanded="false">
                        <i class="bi bi-cart-fill" aria-hidden="true"></i>
                        <span class="hide-menu">Transaksi</span>
                    </a>
                </li>
                <li class="text-center p-20 upgrade-btn">
                    <form action="/logout" method="post">
                        @csrf
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn d-grid btn-danger text-white">Logout</button>
                        </div>
                    </form>
                    {{-- <a href="/logout"
                        class="btn d-grid btn-danger text-white">
                        Logout</a> --}}
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>