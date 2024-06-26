@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование Поста</h1>
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
                <div class="col-12">
                    <form action="{{ route('admin.posts.update', $post) }}" class="col-12" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" id="title" placeholder="Название поста..." name="title" value="{{ $post->title }}">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Категория</label>
                                <select class="custom-select" id="category" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->posts->contains($post->id) ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Теги</label>
                                <div class="select2-purple">
                                    <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Выберите теги" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tags')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="preview_image">Изображение поста (preview)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="preview_image" name="preview_image">
                                        <label class="custom-file-label" for="preview_image">Выберите файл</label>
                                    </div>
                                </div>
                                @if ($post->preview_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif
                                @error('preview_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="main_image">Изображение поста (main)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="main_image" name="main_image">
                                    <label class="custom-file-label" for="main_image">Выберите файл</label>
                                </div>
                                @if ($post->main_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif
                                @error('main_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="summernote">Контент</label>
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
