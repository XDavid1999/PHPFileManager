<div id="shareContentDialog" class="dialog">
    <div>
        <h2 class="h2 text-center">Share File</h2>
    </div>
    <form action="{{ route('shared') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="-">
        <input type="hidden" name="currentDirectory" value="{{$currentDirectory}}">
        <div class="p-4">
            <div class="form-floating py-2">
                <select name="source" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    @foreach ($files as $file=>$f)
                    <option value="{{$f['path']}}">{{$f['name']}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">User</label>
            </div>
            <div class="form-floating py-2">
                <select name="user" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    @foreach ($users as $user)
                    <option value="{{$user->name}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">User</label>
            </div>
        </div>
        <div class="d-flex justify-content-between px-4">
            <button type="submit" class="btn btn-success">Share</button>
            <button type="button" onclick="closeshareContentDialog()" class="btn btn-danger">Close</button>
        </div>
    </form>
</div>
