


<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-header"><a href="{{ route('admin.main.index') }}">ADMIN PANEL</a></li>
                <li class="nav-item">
                    <a href="{{ route('admin.main.index') }}" class="nav-link">
                        <i class="nav-icon far fa-solid fa-newspaper"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">

                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Читатели
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.city.index') }}" class="nav-link">

                        <i class="nav-icon fas fa-solid fa-building"></i>

                        <p>
                            Города
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.news.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-newspaper"></i>
                        <p>
                            Новости
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-newspaper"></i>
                        <p>
                            Cайта
                        </p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
