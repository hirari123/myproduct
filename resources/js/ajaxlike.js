$(function () {
    var likeArticleId;

    $('.js-like-toggle').on('click', function () {
        var $this = $(this);
        likeArticleId = $this.data('articleid'); // Viewからdata-articleid受け取った？

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークンの設定
            },
            url: '/ajaxlike', // Routesの記述(web.phpと合わせる)
            type: 'POST', // リクエストタイプ(GETもある)
            data: {
                'article_id': likeArticleId // Controllerの$requestに渡すパラメータ($request->article_idとして使う)
            },
        })

            // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)
            .done(function (data) {
                // lovedクラスを追加する
                $this.toggleClass('loved');

                // .likesCountの次の要素のhtmlを「data.articleLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.articleLikesCount); // ここの処理がうまくいっていない？？
            })

            // Ajaxリクエストが失敗した場合の処理
            .fail(function (data, xhr, err) {
                // エラーメッセージを出力する記述
                console.log('エラー');
                console.log(err);
                console.log(xhr);
                alert('Ajaxリクエスト失敗');
            });

        return false;
    });
});