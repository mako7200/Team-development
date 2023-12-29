function previewAvatar(input) {
    var preview = document.getElementById('avatar-preview');
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

function changeImage(imgElement) {
    // ここで新しい画像のパスを設定してください
    var newImagePath = "新しい画像のパス";

    // 新しい画像に切り替える
    imgElement.src = newImagePath;
}