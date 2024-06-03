
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
         // アニメーションを一度再生するために一時的にクラスを削除して再追加
         zoomOverlay.classList.remove('zoomAnimation');
        setTimeout(function () {
            zoomedImage.src = zoomImage.src;
            zoomOverlay.style.display = 'flex';
            zoomOverlay.classList.add('zoomed');
        });

        zoomOverlay.addEventListener('click', function () {
            // zoomOverlay.style.display = 'none';
            zoomOverlay.classList.remove('zoomed');
            setTimeout(function () {
                zoomOverlay.style.display = 'none';
                zoomOverlay.style.opacity = '1';
            }, 300); // アニメーションが終わるまでの時間 (0.3秒)
        });

    });
});