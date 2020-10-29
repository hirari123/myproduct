$(function () {
    var like = $('.js-like-toggle');
    var likeArticleId;

    like.on('click', function () {
        var $this = $(this);
        likeArticleId = $this.data('article_id');

        $.ajax({
            // CSRFトークンの設定
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxlike', // ルーティングの記述
            type: 'POST', // 受取方法の記述
            data: {
                'article_id': likeArticleId // $requestでControllerに渡すパラメータ
            },
        })

            // Ajaxリクエストが成功した場合の処理(引数はControllerから受け取る)
            .done(function (data) {
                // lovedクラスを追加する
                $this.toggleClass('loved');

                // .likesCountの次の要素のhtmlを「data.articleLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount);
            })

            // Ajaxリクエストが失敗した場合の処理
            .fail(function (data, xhr, err) {
                // エラーメッセージを出力する記述
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            })
        return false;
    })
})