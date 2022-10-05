@extends('backend.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Companies</h1>
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
                            <a href="{{ route('dashboard.company.create') }}" class="btn btn-outline-primary">create Company</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Users</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies AS $company)
                                    <tr id="tr-{{ $company->id }}">
                                        <td>{{ $company->id }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.company.show', $company->id) }}">{{ $company->name }}</a>
                                        </td>
                                        <td>
                                            {{ $company->users_count }}
                                        </td>
                                        <td>{{ $company->created_at->format('d.m.Y') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('dashboard.company.edit', $company->id) }}" class="btn btn-outline-primary mr-1"><i class="far fa-edit"></i></a>
                                                <button class="btn btn-outline-danger btn-remove" data-remove="tr-{{ $company->id }}" data-url="{{ route("dashboard.company.delete", $company->id) }}"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="mx-auto">
                    {{ $companies->appends(request()->input())->onEachSide(1)->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
