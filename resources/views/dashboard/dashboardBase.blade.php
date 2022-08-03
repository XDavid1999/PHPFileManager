@extends('base')
@section('content')
<div id="dashboard">
    <div class="container w-25">
        <h1 class="h1 text-center">Dashboard</h1>
    </div>
    <div class="row mt-5">
            <div class="col col-6">
                <div class="col card-effect mx-5" style="min-height: 300px; box-shadow: 0 6px 20px rgb(0 0 0 / 0.4); border-radius: 15px; background-color:rgb(245, 245, 245);">
                    @include('dashboard.ownContent', ['array', $array])
                </div>
            </div>
            <div class="col col-6">
                <div class="col card-effect mx-5" style="min-height: 300px; box-shadow: 0 6px 20px rgb(0 0 0 / 0.4); border-radius: 15px; background-color:rgb(245, 245, 245);">
                    @include('dashboard.otherUsersContent', ['array', $array])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
