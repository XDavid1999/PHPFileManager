<div id="createFolderDialog" class="dialog">
    <div>
        <h2 class="h2 text-center">Create Directory in {{$currentDirectory}}</h2>
    </div>
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="d">
        <input type="hidden" name="currentDirectory" value="{{$currentDirectory}}">
        <div class="p-4">
            <div class="py-2">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="name">
            </div>
        </div>
        <div class="d-flex justify-content-between px-4">
            <button type="submit" class="btn btn-success">Create</button>
            <button type="button" onclick="closeCreateFolderDialog()" class="btn btn-danger">Close</button>
        </div>
    </form>
</div>


<style>
    .dialog {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        z-index: 9999;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgb(0 0 0 / 0.4);
        display: none;
        width: 500px
    }

    @media (max-width: 768px) {
        .dialog {
            width: 90% !important;
        }
    }
</style>
