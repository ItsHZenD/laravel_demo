@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    Thêm
                </a>
                <caption>
                    <form action="" class="form-group">
                        Tìm sách: <input class="form-input" type="search" name="q" value="{{ $search }}">
                    </form>
                    {{-- <form action="" class="form-group">
                        Tìm tác giả: <input type="search" class="form-input" name="q_author">
                    </form> --}}
                </caption>
            </div>
            <div class="card-body">
                <table class="table table-hover table-centered mb-0">
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Tuổi</th>
                            <th>Giới tính</th>
                            <th>Ngày tạo</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->gender_name }}</td>
                                <td>{{ $user->year_created_at }}</td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
