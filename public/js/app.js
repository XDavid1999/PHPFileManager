import './bootstrap';

function displayMoveDialog() {
    closeUploadDialog();
    closeCreateFolderDialog();
    closeshareContentDialog();
    document.getElementById("moveDialog").style.display = "block";
}

function closeMoveDialog() {
    document.getElementById("moveDialog").style.display = "none";
}

function displayUploadDialog() {
    closeMoveDialog();
    closeCreateFolderDialog();
    closeshareContentDialog();
    document.getElementById("uploadDialog").style.display = "block";
}

function closeUploadDialog() {
    document.getElementById("uploadDialog").style.display = "none";
}

function displayCreateFolderDialog() {
    closeUploadDialog();
    closeMoveDialog();
    closeshareContentDialog();
    document.getElementById("createFolderDialog").style.display = "block";
}

function closeCreateFolderDialog() {
    document.getElementById("createFolderDialog").style.display = "none";
}

function displayshareContentDialog() {
    closeUploadDialog();
    closeMoveDialog();
    closeCreateFolderDialog();
    document.getElementById("shareContentDialog").style.display = "block";
}
function closeshareContentDialog() {
    document.getElementById("shareContentDialog").style.display = "none";
}
