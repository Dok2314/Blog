@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $post->title }}</h1>
                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" width="600" height="400">
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
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-block btn-primary">Добавить</a>
                </div>

                <div class="col-2">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-block btn-dark">Вернуться к списку</a>
                </div>

                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Категория</th>
                                            <th>Контент</th>
                                            <th>Создана</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->title }}</td>
                                            <td>{{ $post->content }}</td>
                                            <td>{{ \Carbon\Carbon::parse($post->created_at)->toDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success w-50 mb-1">
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.posts.delete', $post) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-danger w-50">
                                                </form>
                                            </td>
                                        </tr>
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
