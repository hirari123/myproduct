## アプリ名
「Paleo Boost(パレオブースト)」
https://paleo-engineer.com

## どんなアプリ？
<p>
ひとことで言うと<br>
「パレオダイエッター(という健康法をやってる人)向けのコミュニティ＋計算機能ツール」<br>
です。<br>
情報を共有したり計算機能を利用したりすることにより健康増進の効果を高めることが目的です。<br>
</p>
<img src="public/images/top-page-screen.png" alt="トップページのイメージ" style="width: 250px">

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
- 投稿の検索機能とページネーション
※レスポンシブは未対応

## 使用技術(言語,フレームワーク,ライブラリ)
- PHP(Laravel7)
- HTML&CSS
- JavaScript(jQuery)
- Bootstrap
- Sass
- MySQL

## 開発環境,エディター
- ローカル環境(MacOS)
- VSCode

## Webサーバー環境
- Apache HTTP Server
- Amazon Linux 2

## インフラ構成
全てAWSで構築(EC2, ELB, RDS, S3, Route53, ACM 等)
<img src="public/images/aws-infra.png" alt="インフラ構成図" style="width: 250px">

## テーブル構成(ER図)
<img src="public/images/er-diagram.png" alt="ER図" style="width: 200px">