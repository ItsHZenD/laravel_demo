@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('books.create') }}" class="btn btn-primary">
                        Thêm sách
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <tr>
                            <th>#</th>
                            <th>Tên sách</th>
                            <th>Tác giả</th>
                            <th>Ngày nhập sách</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        @foreach ($data as $each)
                            <tr>
                                <td>{{ $each->id }}</td>
                                <td>{{ $each->name }}</td>
                                <td>{{ $each->author }}</td>
                                <td>{{ $each->year_created_at }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('books.edit', $each) }}">
                                        Sửa
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('books.destroy', $each) }} "  method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"> Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
