// フォームのsubmitイベントに対してvalidateForm関数を紐付ける
document.getElementById('editForm').addEventListener('submit', function(event) {
    validateForm(event);
});

//新しい画像のプレヴュー機能を追加
function previewAvatar(input) {
    var preview = document.getElementById('avatar-preview');
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function () {
        preview.src = reader.result;
    }

    if(file){
        reader.readAsDataURL(file);
    }else {
        preview.src = "";
    }
}

// フォームのsubmitイベントに対してvalidateForm関数を紐付ける
document.getElementById('editForm').addEventListener('submit', function(event) {
    validateForm(event);
});

// 新しい画像の選択が変更されたときにプレビュー機能を呼び出す
var avatarInput = document.getElementById('avatar');
if (avatarInput) {
    avatarInput.addEventListener('change', function() {
        previewAvatar(this);
    });
}

// windowのloadイベントリスナー内に全てのコードを配置する
window.addEventListener('load', function() {
    // function validateForm...
    // ...
});

// function changeImage(imgElement) {
//     // ここで新しい画像のパスを設定してください
//     var newImagePath = "新しい画像のパス";

//     // 新しい画像に切り替える
//     imgElement.src = newImagePath;
// }