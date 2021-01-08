// エンターキーで送信されないようにする
// ここから
$(function(){
    $("input"). keydown(function(e) {
        if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
            return false;
        } else {
            return true;
        }
    });
});
// ここまで

// フォームが不十分なら送信されず、alertが表示されるようにする
// ここから
$(".button").on("click", function () {
    console.log(1+1);

    if ($('#first').val()==='選択してください' || $('#second').val()==='選択してください' || $('#third').val()==='選択してください') {
        alert('面白かったマンガを3つ選択してください');
        // false を返すと本来のイベント処理をキャンセルできる
        return false;
      }

    if ($('#second').val() === $('#first').val()) {
    alert('異なる3つのマンガを選択してください');
    return false;
    }

    if ($('#second').val() === $('#third').val()) {
    alert('異なる3つのマンガを選択してください');
    return false;
    }

    if ($('#first').val() === $('#third').val()) {
    alert('異なる3つのマンガを選択してください');
    return false;
    }

    if ($('#comment').val()=='') {
        alert('感想を入力してください');
        return false;
      }

    if ($('#favorite').val()=='') {
    alert('おすすめのマンガを入力してください');
    return false;
    }

    if ($('#post').val()=='' || $('#address1').val()=='') {
        alert('住所を入力してください');
        return false;
    }

    // 7桁で郵便番号を入力してないとalert
    // ここから
    if(document.jump.post.value.match(/^\d{3}(\s*|-)\d{4}$/)){
   
    }else{
        alert("7ケタで郵便番号を入力してください");
        return false;
    }
    // ここまで

    if ($('#tel').val()=='') {
        alert('電話番号もしくは携帯電話番号を入力してください');
        return false;
    }

    if ($('#name').val()=='') {
        alert('氏名を入力してください');
        return false;
    }

    if ($('#age').val()=='') {
        alert('年齢を入力してください');
        return false;
    }
});
// ここまで