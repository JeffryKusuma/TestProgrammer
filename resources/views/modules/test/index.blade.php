@extends('app')

@section('title', 'Soal Test')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header"><h3 class="card-title">Soal Test</h3></div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="align-middle">
                        <td>1</td>
                        <td>Nomor 1a</td>
                        <td class="text-center">
                            <a href="{{ route('test.show', 1) }}" class="btn btn-sm btn-primary">show</a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td>2</td>
                        <td>Nomor 2</td>
                        <td class="text-center">
                            <a href="{{ route('test.show', 2) }}" class="btn btn-sm btn-primary">show</a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td>3</td>
                        <td>Nomor 3</td>
                        <td class="text-center">
                            <a href="{{ route('test.show', 3) }}" class="btn btn-sm btn-primary">show</a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td>4</td>
                        <td>Nomor 4</td>
                        <td class="text-center">
                            <a href="{{ route('test.show', 4) }}" class="btn btn-sm btn-primary">show</a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td>5</td>
                        <td>Nomor 5</td>
                        <td class="text-center">
                            <a href="{{ route('test.show', 5) }}" class="btn btn-sm btn-primary">show</a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
@endsection
