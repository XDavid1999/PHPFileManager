@extends('base')
@section('content')
    <div class="container w-25 p-4 card-effect" style="box-shadow: 0 6px 20px rgb(0 0 0 / 0.4); border-radius: 15px;">
        @if ($formAction == '/register')
            <h1 class="h1 text-center">Register</h1>
        @else
            <h1 class="h1 text-center">Log In</h1>
        @endforelse

        <form class="p-4" action="{{$formAction}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            @if ($formAction == '/register')
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
            @endif
            <button type="submit" class="btn btn-success">Go!</button>
            {{-- @if ($formAction === '/login')
                <button type="button" href="{{route('register')}}" class="stretched-link align-bottom mt-2">Sign In</button>
            @endif --}}
        </form>
    </div>
@endsection
