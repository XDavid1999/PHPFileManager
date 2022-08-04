@extends('base')
@section('content')
<div id="dashboard">
    <div class="container w-25">
        <h1 class="h1 text-center">Dashboard</h1>
    </div>
    <div class="row mt-5">
        <div class="col col-md-6 col-sm-6">
            @include('dashboard.ownContent', ['directories' => $directories, 'files' => $files, 'currentDirectory'
            => $currentDirectory, 'users' => $users, 'categories' => $categories])
        </div>
        <div class="col col-md-6 col-sm-6">
            @include('dashboard.otherUsersContent', ['users' => $users])
        </div>
    </div>
</div>
</div>
@endsection