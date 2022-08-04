<div id="moveDialog" class="dialog ">
    <div>
        <h2 class="text-center px-4">Move File to Folder</h2>
    </div>
    <form action="{{route('move')}}" method="POST">
        @csrf
        <div class="p-4">
            <div class="form-floating py-2">
                <select name="source" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    @foreach ($files as $file => $f)
                    <option value="{{$f['path']}}">{{$f['path']}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Source file</label>
            </div>
            <div class="form-floating py-2">
                <select name="target" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    @foreach ($directories as $directory => $d)
                    <option value="{{$d['path']}}">{{$d['path']}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Target Directory</label>
            </div>
        </div>
        <div class="d-flex justify-content-between px-4">
            <button type="submit" class="btn btn-success">Move</button>
            <button type="button" onclick="closeMoveDialog()" class="btn btn-danger">Cerrar</button>
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
        z-index: 1;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgb(0 0 0 / 0.4);
        display: none;
        width: 500px;
    }

    @media (max-width: 768px) {
        .dialog {
            width: 90% !important;
        }
    }
</style>
