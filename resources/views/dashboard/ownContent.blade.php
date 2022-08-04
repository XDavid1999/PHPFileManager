<div>
    @include('dashboard.uploadContentForm', ['currentDirectory' => $currentDirectory], ['categories' => $categories])
    @include('dashboard.moveFolderForm', ['categories' => $categories])
    @include('dashboard.createFolderForm')

    <div class="d-flex justify-content-between p-4 mx-2">
        <h2 class=" text-center">My Content - {{$currentDirectory}}</h2>
        <div class="d-flex">
            @if (str_contains($currentDirectory, '/'))
            <a class="ms-2" href="{{ route('dashboard', 'path='.getParentDirectory($currentDirectory)) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-arrow-left-circle mx-4" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>
            @endif
            <svg onclick="displayCreateFolderDialog()" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                fill="currentColor" class="bi bi-folder-plus mx-4" viewBox="0 0 16 16">
                <path
                    d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                <path
                    d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            <svg onclick="displayMoveDialog()" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="orange"
                class="bi bi-folder-symlink mx-4" viewBox="0 0 16 16">
                <path
                    d="m11.798 8.271-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z" />
                <path
                    d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm.694 2.09A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09l-.636 7a1 1 0 0 1-.996.91H2.826a1 1 0 0 1-.995-.91l-.637-7zM6.172 2a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
            </svg>
            <svg onclick="displayUploadDialog()" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                fill="currentColor" class="bi bi-cloud-arrow-up mx-4" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                <path
                    d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
            </svg>
        </div>
    </div>
    <div class="d-flex justify-content-center px-5 pb-5 row">
        @foreach ($directories as $directory=>$d)
        <div class="m-4 col col-3">
            <div class="d-flex justify-content-center my-2">
                <a href="{{ route('dashboard', 'path='.$d['path']) }}" xmlns="http://www.w3.org/2000/svg">
                    <svg width="100" height="100" fill="deepskyblue" class="bi bi-folder2" viewBox="0 0 16 16">
                        <path
                            d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z" />
                    </svg>
                </a>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <form action="/{{$d['name']}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" style="border: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-share"
                            viewBox="0 0 16 16">
                            <path
                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                        </svg>
                    </button>
                </form>
                <span class="mx-3">{{$d['name']}}</span>
                <form action="{{ route('destroy') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="d">
                    <input type="hidden" name="path" value="{{ $d['path'] }}">
                    <button style="border: none;" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash"
                            viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        @foreach ($files as $file=>$f)
        <div class="m-4 col col-3">
            <div class="d-flex justify-content-between px-0">
                <form id="{{$f['name']}}" action="{{ route('privacity') }}" method="POST">
                    @csrf
                    <div class="form-check form-switch">
                        <input type="hidden" name="path" value="{{ $f['path'] }}">
                        <input type="hidden" name="visibility" value="public">
                        <input class="form-check-input" name="visibility" type="checkbox"
                            value="{{$f['visibility'] == 'public' ? 'private' : 'public'}}" {{
                            ($f['visibility']=='public' ? 'checked' : '' ) }}
                            onchange="document.getElementById('{{$f['name']}}').submit();">
                        <label class="form-check-label" for="privacity">
                            {{$f['visibility']}}
                        </label>
                    </div>
                </form>
                @if ($f['visibility'] == 'private')
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-lock-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-unlock-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                </svg>
                @endif
            </div>
            <div class="d-flex justify-content-center my-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green"
                    class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                    <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                </svg>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <form action="/{{$f['name']}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" style="border: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                            class="bi bi-share-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                        </svg>
                    </button>
                </form>
                <span class="mx-3">{{$f['name']}}</span>
                <form action="{{ route('destroy') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="-">
                    <input type="hidden" name="path" value="{{ $f['path'] }}">
                    <button style="border: none;" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path
                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function displayMoveDialog() {
        closeUploadDialog();
        closeCreateFolderDialog();
        document.getElementById("moveDialog").style.display = "block";
    }

    function closeMoveDialog() {
        document.getElementById("moveDialog").style.display = "none";
    }

    function displayUploadDialog() {
        closeMoveDialog();
        closeCreateFolderDialog();
        document.getElementById("uploadDialog").style.display = "block";
    }

    function closeUploadDialog() {
        document.getElementById("uploadDialog").style.display = "none";
    }

    function displayCreateFolderDialog() {
        closeUploadDialog();
        closeMoveDialog();
        document.getElementById("createFolderDialog").style.display = "block";
    }

    function closeCreateFolderDialog() {
        document.getElementById("createFolderDialog").style.display = "none";
    }
</script>