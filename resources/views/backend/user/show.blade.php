@extends('backend.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $user->name }}</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('dashboard.user.edit', $user->id) }}" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <td>Company</td>--}}
{{--                                        <td>@if($user->company->id)<a href="{{ route('dashboard.company.show', $user->company->id) }}">{{ $user->company->name }}</a>@endif</td>--}}
{{--                                    </tr>--}}
                                    <tr>
                                        <td>Added</td>
                                        <td>{{ $user->created_at->format('d.m.Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Companies
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->companies AS $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.company.show', $company->id) }}">{{ $company->name }}</a>
                                        </td>

                                        <td>
{{--                                            <div class="d-flex">--}}
{{--                                                <a href="{{ route('dashboard.user.edit', $user->id) }}" class="btn btn-outline-primary mr-1"><i class="far fa-edit"></i></a>--}}
{{--                                                <form action="{{ route('dashboard.user.delete', $user->id) }}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('delete')--}}
{{--                                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
