
function previewImage(input) {
    var preview = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var zoomImage = document.getElementById('zoom-image');
    var zoomOverlay = document.getElementById('zoom-overlay');
    var zoomedImage = document.getElementById('zoomed-image');

    zoomImage.addEventListener('click', function () {
        zoomedImage.src = zoomImage.src;
        zoomOverlay.style.display = 'flex';
    });

    zoomOverlay.addEventListener('click', function () {
        zoomOverlay.style.display = 'none';
    });
});