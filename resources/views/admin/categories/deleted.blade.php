@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Удаленные категории</h1>
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
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-block btn-primary">Добавить</a>
                </div>

                <div class="col-2">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-block btn-warning text-black">Вернуться к списку</a>
                </div>

                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Список категорий</h3>

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
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Дата создания</th>
                                            <th>Дата удаления</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ \Carbon\Carbon::parse($category->created_at)->toDateString() }}</td>
                                                <td>{{ \Carbon\Carbon::parse($category->deleted_at)->toDateString() }}</td>
                                                <td>
{{--                                                    <a href="{{ route('admin.categories.show', $category) }}">--}}
{{--                                                        <i class="far fa-eye"></i>--}}
{{--                                                    </a>--}}

                                                    <form action="{{ route('admin.categories.restore', $category) }}" method="POST">
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
