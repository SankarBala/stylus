@extends('admin.layouts.app')

@section('title', 'Users')

@section('pageTitle', 'Users')

@section('contentHeader')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.style.create') }}">Create new style</a></li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subscription</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $index => $user)
                    <tr>
                        <th scope="row">{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ ucFirst($user->subscription) }}</th>
                    </tr>
                @endforeach


            </tbody>
        </table>

        <br />
        <br />
        <br />

        {{ $users->links() }}

    </div>
@endsection
