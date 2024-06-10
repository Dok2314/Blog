@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование Пользователя `{{ $user->name }}`</h1>
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
                    <form action="{{ route('admin.users.update', $user) }}" class="col-12" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" placeholder="Имя" name="name" value="{{ $user->name ? $user->name : old('name') }}">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $user->email ? $user->email : old('email') }}">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role_id">Роль</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->users->contains($user) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary toggle-password" type="button"><i class="fas fa-eye"></i></button>
                                    </div>
                                </div>
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Повторите пароль</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Password confirm" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary toggle-password" type="button"><i class="fas fa-eye"></i></button>
                                    </div>
                                </div>
                                @error('password_confirmation')
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
