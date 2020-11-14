$(function () {
    var bodyWeight;

    $('.js-sixpacking-intake').on('change mouseout', function () {
        // Viewのフォームから受け取る
        bodyWeight = $("[name=body_weight]").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークンの設定
            },
            url: '/ajaxsixpacking', // Routesの記述(web.phpと合わせる)
            type: 'POST', // リクエストタイプ(GETもある)
            data: {
                'body_weight': bodyWeight,// Controllerの$requestに渡すパラメータ
            },
        })

            // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)
            .done(function (data) {
                // 表の計算結果とhiddenのinputのvalueを書き換える
                $('.sixpacking-target-calories').html(data['sixpacking_target_calories']);
                $('[name="sixpacking-target-calories"]').val(data['sixpacking_target_calories']);
                $('.sixpacking-target-protein').html(data['sixpacking_target_protein']);
                $('[name="sixpacking-target-protein"]').val(data['sixpacking_target_protein']);
                $('.sixpacking-target-lipid').html(data['sixpacking_target_lipid']);
                $('[name="sixpacking-target-lipid"]').val(data['sixpacking_target_lipid']);
                $('.sixpacking-target-carbohydrate').html(data['sixpacking_target_carbohydrate']);
                $('[name="sixpacking-target-carbohydrate"]').val(data['sixpacking_target_carbohydrate']);
            })

            // Ajaxリクエストが失敗した場合の処理
            .fail(function (data, xhr, err) {
                // エラーメッセージを出力する記述
                console.log('エラー');
                console.log(err);
                console.log(xhr);
                alert('Ajaxリクエスト失敗！');
            });

        return false;
    });

    // 未計算でフォーム送信した時のバリデーション
    $("#js_sixpacking_submit").submit(function () {
        if ($("input[name='sixpacking-target-calories']").val() == 0) {
            alert('未計算です。現在の体重を設定してください。');
            return false;
        } else {
            $("js_sixpacking_submit").submit();
        }
    });
});