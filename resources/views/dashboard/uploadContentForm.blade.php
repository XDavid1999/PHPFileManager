<div id="uploadDialog" id="page-mask" class="dialog">
    <div>
        <h2 class="h2 text-center">Upload</h2>
    </div>
    <form action="" method="POST">
        @csrf
        <div class="p-4">
            <div class="py-2">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="name">
            </div>
            <div class="form-floating py-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    @foreach ($array as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
            <div class="d-flex justify-content-between py-2">
                <div class="mb-3">
                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                </div>
                <div class="form-check form-switch align-middle mx-1">
                    <input class="form-check-input mx-1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Privacy</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between px-4">
            <button type="submit" class="btn btn-success">Go!</button>
            <button type="button" onclick="closeUploadDialog()" class="btn btn-danger">Cerrar</button>
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
    #page-mask {
        background: rgba(0, 0, 0, 0.5);
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
