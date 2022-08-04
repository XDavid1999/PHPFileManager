@extends('base')
@section('content')
<div class=" mb-4">
    <h1 class="h1 text-center">Categories</h1>
</div>
<div class="middle">
    <div class="cards">
        <div class="d-flex justify-content-between mt-4 mx-3">
            @if ($formType != 'edit')
                <h2 class="h2">Create</h2>
            @else
                <h2 class="h2">Edit</h2>
            @endforelse
            @if ($formType == 'edit')
                <form action="{{route('category')}}">
                    <button type="submit" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-arrow-left-circle icons" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                        </svg>
                        Volver
                    </button>
                </form>
            @endif
        </div>

        <form class="d-flex p-2" action="{{ ($formType != 'edit') ? route('category.store') : "/category/{$category->id}/update"}}" method="POST">
            @csrf
            @if (isset($category))
            @method('PUT')
            @endif
            <div class="container">
                <label for="name" class="form-label">Name</label>
                <div class="d-flex">
                    <input type="name" name="name" class="form-control" id="name" value="{{ isset($category) ? $category->name : ''}}">
                    <button type="submit" class="btn btn-success mx-2">{{($formType != 'edit') ? 'Create' : 'Edit'}}</button>
                </div>
            </div>
        </form>

        @if (isset($categories))
        <table class="table">
            <thead class="px-md-5">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="px-md-5">
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

<style>
    .cards{
        width: 500px;
        margin: 20px;
        min-height: 300px;
        border-style: solid;
        border-radius: 20px;
        border-color: rgb(219, 219, 219);
        border-width: 2px;
    }
    .middle{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    @media (max-width: 768px) {
        .cards{
            width: 90% !important;
        }
    }
</style>
