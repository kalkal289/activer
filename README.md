<img src="https://github.com/kalkal289/activer/assets/101095592/d24c31b7-bbeb-4a75-8c08-228689d57e66" width="40%">

## アプリケーション名
「_Activer_」

## アプリケーション概要
### 個人が自分の経験やスキルを使い活動することを、支援するSNSサービス  
　個人が自分の経験やスキルを使い活動することを支援するSNSサービスです。個人の活動についての情報を発信することに特化しており、その人の活動情報をまとめ、発信することができます。

　重要な投稿をまとめるBig Post機能を始め、自身の活動をまとめるメインコンテンツ機能、自身の収入を得るための活動への導線をまとめるストア機能により、自分の情報を細かくまとめることができるのが特徴です。

　投稿、メインコンテンツ、ストア、ユーザーそれぞれの検索が可能で、ユーザーに至っては、それぞれが5つまでつけることのできる”ユーザータグ”による検索もできます。投稿タグも今後実装していく予定です。

　フロントエンドにも力を入れており、配色や配置を見やすいように試行錯誤し、さらに入力文字数カウンターやフロント側のバリデーションを実装することで、ユーザーが使いやすいように工夫しました。

　また、スマートフォンなどの縦画面にも対応しており、縦画面時にもメニューバーやハンバーガーメニューを設置することで、どちらでも使いやすいようにしました。

　工夫した点は他にも説明しきれないほどたくさんあるので、ぜひ一度実際に使用してみて下さい！
  
## URL
https://activer-8261697db362.herokuapp.com/  
最初に表示されるトップページはログインをしなくても見ることができます。  
それ以外のぺージはログインをお願いします。（下記のテスト用アカウントをお使いください。）  
  
## テスト用アカウント
メールアドレス: test2@example.com  
パスワード: password  
(「test2~」から「test9~」まであるのでご自由にお使いください。パスワードは共通です。)  

## 利用方法
（作成途中）

## 目指した課題解決
　現在は以前に比べ、個人の知識やスキルが重視されるようになり、働き方の幅も大きく広がったことで、個人がより活躍しやすくなりました。

　そのため、私は自身の詳細な能力や実績とその過程を記録し、それを見てもらうことで、企業や顧客から適切な評価をしてもらうことが重要だと考えました。

　しかし、現在ある個人が活動するためのプラットフォームは分野ごとに特化しているものが多く、SNSに関しても分野ごとに違うアカウントで運用することが一般的です。そのため、個人が全体的にどのような活動をしているのか、そして、そのためにどのような過程を辿ってきたのかを把握することが難しくなっています。

　つまり、個人の情報が分散してしまっているのです。

　そのため、私はこの問題を解決するために、個人で活動する人の実績や活動内容をまとめ、適宜その過程の発信ができるSNSの制作をすることにしました。

## 使用技術
### 環境
* AWS
* Laravel
* Breeze
* MYSQL
### 言語
* PHP
* HTML
* Tailwind css
* JavaScript
* jQuery
### ツール
* Git
* GitHub
### API
* Cloudinary
  
## 要件定義一覧
（作成途中）
| 優先度(3>2>1) | 機能 | 目的 | 詳細 | 制作背景 | 
| - | - | - | - | - |
| 3 | DB設計 | アプリ全体を把握し、必要なテーブルとカラムを洗い出す | 詳細は下部の「DB設計」に記載 | アプリを作るうえで必要なため特になし |

## 実装した機能一覧
### 基本機能
1. ログイン機能
2. 投稿機能
3. コメント機能
4. メインコンテンツ作成
5. ストアコンテンツ作成
6. メイン、ストア編集機能
7. 投稿削除機能
8. いいね機能
9. フォロー機能
10. プロフィール編集機能
### 補助機能
1. プロフィール画像
2. 文字数カウント機能
3. ビッグポスト選択
4. 複数写真添付機能
5. 投稿カテゴリー
6. ストアカテゴリー
7. いいね一覧表示
8. 複数キーワード検索機能
9. フォロー中のみ絞り込み機能
10. ビッグポスト絞り込み機能
11. フォロー中、フォロワー一覧
12. バリデーション（フロント＆バック）
### レスポンシブデザイン(縦画面対応)
1.  ハンバーガーメニュー
2.  ナビゲーション

## 今後実装予定の機能
1. ユーザータグ機能
2. 投稿タグ機能
3. ハイパーリンク機能
4. 非同期いいね機能
5. いいねしたユーザー一覧表示機能
6. 通知機能
7. 投稿カテゴリー作成機能
8. 投稿のカテゴリー編集機能
9. APIログイン機能
10. トレンド機能
11. 画像拡大表示機能

## DB設計（ER図）
<img src="https://github.com/kalkal289/lev_col/assets/101095592/987a2ddb-32c7-407a-b394-6f549b92c4ad" width="60%">

## ローカルでの動作方法
（作成途中）
