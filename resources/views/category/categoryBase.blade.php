@extends('base')
@section('content')
<div id="dashboard">
    <div class="container w-25 mb-4">
        <h1 class="h1 text-center">Categories</h1>
    </div>
    <div class="container w-25 p-4 card-effect" style="box-shadow: 0 6px 20px rgb(0 0 0 / 0.4); border-radius: 15px;">
        @if ($formType != 'edit')
        <h2 class="h2 text-center">Create</h2>
        @else
        <h2 class="h2 text-center">Edit</h2>
        @endforelse

        <form class="d-flex p-2" action="{{ ($formType != 'edit') ? route('category.store') : "/category/{$category->id}/update"}}" method="POST">
            @csrf
            @if (isset($category))
            @method('PUT')
            @endif
            <div class="container">
                <label for="name" class="form-label">Name</label>
                <div class="d-flex">
                    <input type="name" name="name" class="form-control" id="name" value="{{ isset($category) ? $category->name : ''}}">
                    <button type="submit" class="btn btn-success mx-2">Create</button>
                </div>
            </div>
        </form>

        @if (isset($categories))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($categories) > 0)
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td class="d-flex">
                        <form class="mx-1" action="{{"/category/{$category->id}/edit"}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form class="mx-1" action="{{"/category/{$category->id}/delete"}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th scope="row"></th>
                    <td>No Data Available</td>
                    <td></td>
                </tr>
                @endif
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection