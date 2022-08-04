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
