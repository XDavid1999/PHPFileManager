@extends('base')
@section('content')
<div id="dashboard">
    <div class="container w-25">
        <h1 class="h1 text-center">Dashboard</h1>
    </div>
    <div class="container w-25 text-center">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif
    </div>
    <div class="row mt-5">
        <div class="col col-md-6 col-sm-6">
            <div class="col card-effect cards">
                @include('dashboard.ownContent', ['directories' => $directories, 'files' => $files, 'currentDirectory'
                => $currentDirectory, 'users' => $users, 'categories' => $categories])
            </div>
        </div>
        <div class="col col-md-6 col-sm-6">
            <div class="col card-effect cards">
                @include('dashboard.otherUsersContent', ['users' => $users])
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<style>
    .cards{
        margin: 20px;
        min-height: 300px;
        border-style: solid;
        border-radius: 20px;
        border-color: rgb(219, 219, 219);
        border-width: 2px;
    }
</style>
