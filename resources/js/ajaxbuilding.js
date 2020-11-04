$(function () {
    var bodyWeight;
    var bodyFatPercentage;

    $('.js-building-intake').on('keyup', function () {
        var $this = $(this);
        // Viewのフォームから受け取る
        bodyWeight = $("[name=body_weight]").val();
        bodyFatPercentage = $("[name=body_fat_percentage]").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークンの設定
            },
            url: '/ajaxbuilding', // Routesの記述(web.phpと合わせる)
            type: 'POST', // リクエストタイプ(GETもある)
            data: {
                'body_weight': bodyWeight,
                'body_fat_percentage': bodyFatPercentage, // Controllerの$requestに渡すパラメータ
            },
        })

            // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)
            .done(function (data) {
                // 表の計算結果とhiddenのinputのvalueを書き換える
                $('.lean-body-mass').html(data['lean_body_mass']);
                $('[name="lean-body-mass"]').val(data['lean_body_mass']);
                $('.building-target-calories').html(data['building_target_calories']);
                $('[name="building-target-calories"]').val(data['building_target_calories']);
                $('.building-target-protein').html(data['building_target_protein']);
                $('[name="building-target-protein"]').val(data['building_target_protein']);
                $('.building-target-lipid').html(data['building_target_lipid']);
                $('[name="building-target-lipid"]').val(data['building_target_lipid']);
                $('.building-target-carbohydrate').html(data['building_target_carbohydrate']);
                $('[name="building-target-carbohydrate"]').val(data['building_target_carbohydrate']);
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
});