# アプリ名：ChargerReview

# 概要
愛用している充電器をレビュー投稿して皆で共有することができるアプリです。

# このアプリを作成した理由
スマホを購入した時に付属してくる充電器は充電速度が遅く不便に感じ、急速充電器の購入を検討していましたが、
どれを選べばいいか分かりませんでした。「他人が使っている充電器をみて参考にしたい」と思い、
このアプリを作成しました。

# 工夫した点
- 女性の方でも入ってきやすいように、落ち着いたデザインになるように心がけました。
- レビュー記事一覧画面で複合条件での絞り込み機能を実装しました。
- スマホ一つで利用できるようにレスポンシブ対応。
  
# 機能一覧
- ユーザー認証
    - アカウント作成、マイページ、編集、削除 
    - ログイン、ログアウト、パスワード変更
- レビュー記事の一覧表示
    - キーワードでの検索
    - 複合条件での絞り込み
    - ページネーション 
- レビュー投稿
    - 新規記事の作成（画像アップロードあり）、編集
- コメント機能
    - レビュー記事に対するコメント、コメントに対する返信
- お問い合わせ

# ER図
![ER図](https://github.com/masa-png/charger-review-app/assets/97292904/1f0ed1e0-6285-4709-9813-ffb9d1277b1a)

# 画面遷移図
![画面遷移図](https://github.com/masa-png/charger-review-app/assets/97292904/335d3b58-3ae5-46e0-b773-2985616fd453)

# 使用技術
- jQuery 3.6
- Bootstrap 5.3
- PHP 8.1
- Laravel 10系
- MySQL 8系
- Apache
- AWS
   - S3
- さくらのVPS
   - ubuntu 
