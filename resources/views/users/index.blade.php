@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('create') }}" class="btn btn-primary">
                    Thêm
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-centered mb-0">
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Tuổi</th>
                            <th>Giới tính</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->gender_name }}</td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
