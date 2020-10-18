// フォームの本文の文字数を扱う

// 文字数制限のバリデーション
$("#post-form").submit(function () {
    if ($("textarea[name='body']").val() == '') {
        alert('投稿文を入力してください');
        return false;
    } else if ($("textarea[name='body']").val().length > 120) {
        alert('投稿文は120文字以内で入力してください');
        return false;
    } else {
        $("#post-form").submit();
    }
});

// 文字数のカウントアップ
// #countUpに対してkeyupイベントをセット
// テキストエリアの文字数を取得して#count1に文字数を表示させる
// $(this)は#countUpを指している
$('#countUp').keyup(function () {
    $('#count1').text($(this).val().length);

    // 文字数制限を超える場合は文字色を変える
    if (($(this).val().length) > 120) {
        $('#count1').css('color', 'red');
    } else {
        $('#count1').css('color', 'white');
    }
});
