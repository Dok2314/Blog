@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Удаленные пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-1">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-block btn-primary">Добавить</a>
                </div>

                <div class="col-2">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-warning text-black">Вернуться к списку</a>
                </div>

                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Список пользователей</h3>

{{--                                    <div class="card-tools">--}}
{{--                                        <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

{{--                                            <div class="input-group-append">--}}
{{--                                                <button type="submit" class="btn btn-default">--}}
{{--                                                    <i class="fas fa-search"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="card-tools">
                                        <label for="postsPerPage"></label>
                                        <div class="input-group input-group-sm" style="width: 220px;">
                                            <form id="perPageForm" method="GET" action="{{ route('admin.posts.index') }}" class="mb-3">
                                                <label for="postsPerPage">Пользователей на страницу:</label>
                                                <div class="input-group input-group-sm" style="width: 220px;">
                                                    <select name="perPage" id="postsPerPage" class="form-control" onchange="document.getElementById('perPageForm').submit();">
                                                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                                                        <option value="200" {{ request('perPage') == 200 ? 'selected' : '' }}>200</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Имя</th>
                                            <th>Email</th>
                                            <th>Роль</th>
                                            <th>Дата создания</th>
                                            <th>Дата удаления</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($user->created_at)->toDateString() }}</td>
                                                <td>{{ \Carbon\Carbon::parse($user->deleted_at)->toDateString() }}</td>
                                                <td>
                                                    <form action="{{ route('admin.users.restore', $user) }}" method="POST">
                                                        @csrf
                                                        <input type="submit" value="Восстановить" class="btn btn-danger">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
