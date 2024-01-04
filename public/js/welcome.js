

$(window).on('load',function(){
    $("#splash-logo").delay(1200).fadeOut('slow');//ロゴを1.2秒でフェードアウトする記述
  
    //=====ここからローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる
    $("#splash").delay(600).fadeOut('slow',function(){//ローディングエリア（splashエリア）を1.5秒でフェードアウトする記述
    
        $('body').addClass('appear');//フェードアウト後bodyにappearクラス付与
  
    });
    //=====ここまでローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる
    
   //=====ここから背景が伸びた後に動かしたいJSをまとめたい場合は
    $('.splashbg').on('animationend', function() {    
        //この中に動かしたいJSを記載
    });
    //=====ここまで背景が伸びた後に動かしたいJSをまとめる
        
});

document.addEventListener("scroll", function() {
    var registerLogin = document.querySelector('.register-login');
    var scrollPosition = window.scrollY;

    if (scrollPosition > 10) { // 100px以上スクロールしたら
        registerLogin.style.top = '10px';
        registerLogin.style.right = '10px';
    } else {
        registerLogin.style.top = '45%';
        registerLogin.style.right = '41%';
    }
});

document.addEventListener("scroll", function() {
    var scrolldown = document.querySelector('.scrolldown');
    var scrollPosition = window.scrollY;

    if (scrollPosition > 10) { // 10px以上スクロールしたら
        // 特定のスクロール位置でのスタイル
        scrolldown.style.bottom = '10%';
        scrolldown.style.right = '2%';
    } else {
        // 元のスタイル
        scrolldown.style.bottom = '30%';
        scrolldown.style.right = '2%';
    }

    // 新しい条件を追加して、一定の高さで非表示にする
    if (scrollPosition > 1900) { // 100px以上スクロールしたら
        scrolldown.style.display = 'none';
    } else {
        scrolldown.style.display = 'block'; // または 'inline' など適切な表示属性を使用する
    }
});


