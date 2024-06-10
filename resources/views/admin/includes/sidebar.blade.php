<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(\Illuminate\Support\Facades\Auth::user())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }} ({{ \Illuminate\Support\Facades\Auth::user()->role->name }})</a>
                    </div>
                </div>
            @endif

            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.tags.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Теги
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Посты
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.roles.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Роли
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
