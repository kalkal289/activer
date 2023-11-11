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
### ログイン前
ログイン前には、トップページのみ見ることが可能です。  
新規登録画面にてアカウントを作成し、ログインすることで、全ての機能を利用することができます。  

### おすすめの初期設定
また、登録したら、先にユーザータグとマイカテゴリーを設定することをお勧めします。  
　ユーザータグ・・・自身の投稿やマイページを見てもらったときに、瞬時に自身の特徴を知ってもらうことができるます。  
　マイカテゴリー・・・マイカテゴリーを設定しておくことで、投稿をまとめ、投稿とメインコンテンツを関連付けることができます。　　
どちらも1分ほどで設定ができるため、ぜひ試してみてください。 

### マイページの充実化
マイページでは、メインコンテンツとストアコンテンツを作成することができます。どちらも早めに作成することをお勧めしますが、お好きなタイミングで作成、編集が可能です。  
　メインコンテンツ・・・自身の活動内容をまとめ、紹介することができます。
　ストアコンテンツ・・・収益活動への導線をまとめることができます。

### その後
これらの設定が終われば、あとは適宜つぶやきや頑張りの過程を投稿して、好きなように活動するだけです 。  
イベントの開催や、情報収集などに使うのも良いかもしれません。  

当初、このアプリは活動の記録・発信のために制作しましたが、それ以外にも、私はこのアプリを通して、使ったすべての人に交流を増やしてもらいたいと思っています。  
人とのつながりは、きっと、今行っている活動を始め、人生全体をより良いものにしてくれると思います。  
Activerがたくさんの人の活動と人生をより良いものにすることを祈っています。

## 目指した課題解決
　現在は以前に比べ、個人の知識やスキルが重視されるようになり、働き方の幅も大きく広がったことで、個人がより活躍しやすくなりました。

　そのため、私は自身の詳細な能力や実績とその過程を記録し、それを見てもらうことで、企業や顧客から適切な評価をしてもらうことが重要だと考えました。

　しかし、現在ある個人が活動するためのプラットフォームは分野ごとに特化しているものが多く、SNSに関しても分野ごとに違うアカウントで運用することが一般的です。そのため、個人が全体的にどのような活動をしているのか、そして、そのためにどのような過程を辿ってきたのかを把握することが難しくなっています。

　つまり、個人の情報が分散してしまっているのです。

　そのため、私はこの問題を解決するために、個人で活動する人の実績や活動内容をまとめ、適宜その過程の発信ができるSNSの制作をすることにしました。

## 使用技術
### 環境
* AWS
* Laravel 9.52.15
* Breeze
* MYSQL
### 言語
* PHP 8.0.30
* HTML
* Tailwind css
* JavaScript
* jQuery
### ツール
* Git
* GitHub
### API
* Cloudinary

## 実装した機能一覧
* **ユーザー登録、ログイン機能**
* **投稿機能**
  * ビッグポスト機能
  * 複数画像添付
  * 投稿タグ機能
  * 投稿削除機能
  * いいね機能（非同期）
  * マイカテゴリー機能
* **投稿詳細表示機能**
  * コメント機能
  * コメント削除機能
  * 特定の投稿をいいねしたユーザー一覧表示機能
* **マイページ作成機能**
  * メインコンテンツ作成機能
  * ストアコンテンツ作成機能
  * ストアカテゴリー機能
  * メイン・ストア編集機能
  * メイン・ストア削除機能
  * フォロー機能
  * フォロー中・フォロワー一覧表示機能
  * いいねした投稿一覧表示機能
  * マイカテゴリーによる投稿絞り込み機能
* **検索機能**
  * 投稿検索機能
  * メインコンテンツ検索機能
  * ストアコンテンツ検索機能
  * ユーザー検索機能
  * 投稿タグ絞り込み機能
  * ユーザータグ絞り込み機能
  * 複数キーワード検索機能
  * フォローしてる人のみの絞り込み機能
  * ビッグポスト絞り込み機能
* **プロフィール編集機能**
  * ニックネーム機能
  * プロフィール画像
  * ユーザータグ機能
  * 自己紹介文
  * プロフィール編集機能
* **ユーザビリティ向上の為の機能**
  * 画像拡大表示機能
  * 自動ハイパーリンク機能
  * 投稿タグとユーザータグの自動リンク化機能
  * 文字数カウント機能
  * フロントとバック両方でのバリデーション
* **レスポンシブデザイン（縦画面対応）の機能**
  * ハンバーガーメニュー
  * ナビゲーションバー

## 今後実装予定の機能
1. 通知機能
2. APIログイン機能
3. トレンド機能
4. ヘルプ機能

## DB設計（ER図）
<img src="https://github.com/kalkal289/activer/assets/101095592/d76c2b7c-6993-401a-8254-bb6257a3f779" width="60%">
