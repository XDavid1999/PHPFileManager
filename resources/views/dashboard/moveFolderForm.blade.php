<div id="moveDialog" class="dialog ">
    <div>
        <h2 class="text-center px-4">Move File to Folder</h2>
    </div>
    <form action="" method="POST">
        @csrf
        <div class="p-4">
            <div class="form-floating py-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    @foreach ($array as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
            <div class="form-floating py-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    @foreach ($array as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
        </div>
        <div class="d-flex justify-content-between px-4">
            <button type="submit" class="btn btn-success">Go!</button>
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

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */

        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

</style>
