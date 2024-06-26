@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Посты</h1>
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
                    <a href="{{ route('admin.posts.deleted') }}" class="btn btn-block btn-warning text-black">Удаленные посты</a>
                </div>

                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Список постов</h3>

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
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <form id="perPageForm" method="GET" action="{{ route('admin.posts.index') }}" class="mb-3">
                                                <label for="postsPerPage">Постов на страницу:</label>
                                                <div class="input-group input-group-sm" style="width: 150px;">
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
                                            <th>Изображение</th>
                                            <th>Название</th>
                                            <th>Контент</th>
                                            <th>Категория</th>
                                            <th>Дата создания</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    @if($post->preview_image)
                                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" width="140" height="100">
                                                    @else
                                                        <strong>No image</strong>
                                                    @endif
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->content }}</td>
                                                <td>{{ $post->category->title }}</td>
                                                <td>{{ \Carbon\Carbon::parse($post->created_at)->toDateString() }}</td>
                                                <td>
                                                    <a href="{{ route('admin.posts.show', $post) }}">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-success">
                                                        edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
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
