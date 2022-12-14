<div id="uploadDialog" class="dialog">
    <div>
        <h2 class="h2 text-center">Upload file in {{$currentDirectory}}</h2>
    </div>
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="-">
        <input type="hidden" name="currentDirectory" value="{{$currentDirectory}}">
        <div class="p-4">
            <div class="py-2">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" placeholder="Rename file name without extension" class="form-control"
                    id="name" aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">For default name of original file</div>
            </div>
            <div class="form-floating py-2">
                <select name="category" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option disabled selected value>Select category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Category</label>
            </div>
            <div class="d-flex justify-content-between py-2">
                <div class="mb-3">
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="file">
                </div>
                <div class="form-check form-switch align-middle mx-1">
                    <input type="hidden" name="visibility" value="private">
                    <input class="form-check-input" name="visibility" type="checkbox" value="public"
                        id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Public</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between px-4">
            <button type="submit" class="btn btn-success">Upload</button>
            <button type="button" onclick="closeUploadDialog()" class="btn btn-danger">Close</button>
        </div>
    </form>
</div>
