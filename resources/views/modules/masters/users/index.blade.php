@extends('app')

@section('title', 'Users')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header"><h3 class="card-title">Users</h3></div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($data as $items)
                    <tr class="align-middle">
                        <td>{{$items->id}}</td>
                        <td>{{$items->name}}</td>
                        <td>{{$items->email}}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $items->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('users.edit', $items->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                <button type="submit" class="btn btn-sm btn-danger">Del</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
            </div>
        </div>
        <!-- /.card -->

    </div>
@endsection
