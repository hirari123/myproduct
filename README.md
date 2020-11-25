## アプリ名
「Paleo Boost(パレオブースト)」<br>
https://paleo-engineer.com

## どんなアプリ？
<p>
ひとことで言うと<br>
「パレオダイエッター(という健康法をやってる人)向けのコミュニティ＋計算機能ツール」<br>
です。<br>
情報を共有したり計算機能を利用したりすることにより健康増進の効果を高めることが目的です。<br>
</p>
<img src="public/images/PaleoBoost_Movie201118.gif" alt="アプリ画面の紹介動画" style="width: 70%">

## できること(実装した機能)
- ユーザー登録・ログイン機能・ゲストログイン機能
- プロフィール編集機能(自己紹介文とアバター画像)
- 投稿作成機能(モーダル画面,文字数カウント)
- 画像の投稿機能(自動リサイズ)
- コメント機能
- 投稿とコメントの編集・削除機能
- いいね機能(Ajax利用,リレーション数取得)
- 効率よく筋肉を増やすための目標摂取カロリーおよび三大栄養素の計算(Ajax)
- 最速で腹筋を割るための目標摂取カロリーおよび三大栄養素の計算(Ajax)
- 投稿の検索機能とページネーション<br>
※レスポンシブは未対応

## 使用技術(言語,フレームワーク,ライブラリ)
- 言語：PHP / JavaScript(jQuery) / Bootstrap / HTML / CSS(Sass)
- フレームワーク：Laravel7
- DBMS：MySQL
- インフラ：AWS (EC2 / RDS / S3 / ELB / Route53 / ACM 等)
- Webサーバー：Apache HTTP Server / Amazon Linux OS2
- 開発環境：ローカル環境(MacOS) / VSCode 

## インフラ構成図
全てAWSで構築
<img src="public/images/aws-infra.png" alt="インフラ構成図" style="width: 80%">

## テーブル構成(ER図)
<img src="public/images/er-diagram.png" alt="ER図" style="width: 80%">