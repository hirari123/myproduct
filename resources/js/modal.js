// ウィンドウを開く
$('.js-modal-open').each(function () {
    $(this).on('click', function () {
        var target = $(this).data('target');
        var modal = document.getElementById(target);
        $(modal).fadeIn(300);
        return false;
    });
});

// ウィンドウを閉じる
$('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut(300);
    return false;
});

// フォームのバリデーション
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