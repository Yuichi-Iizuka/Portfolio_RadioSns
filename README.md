# RadioSns
# 概要
ラジオリスナーの反応を楽しむSNSアプリです。  
リアルタイムで聞かなくとも、Twitterの反応を経過時間毎に確認できます。 

URL:https://radiosns.com
<br>
## アプリ画面
### 一覧画面
![radiosns com_program](https://user-images.githubusercontent.com/75148506/125469151-8b30840f-743f-4738-882e-817fc5017ff5.png)
### 番組詳細画面
![radiosns com_program_8](https://user-images.githubusercontent.com/75148506/125469432-e82ef88e-7728-4499-926d-f4a64303f022.png)
### つぶやき取得画面  
（こちらの画像上では、ユーザー名の箇所をぼかしております
![radiosns (1)](https://user-images.githubusercontent.com/75148506/125470516-589c01a4-99c5-41b5-82a5-3915d0f72ab2.png)

# 開発した背景
深夜ラジオを聴くのが好きで、リアルタイムでなくてもTwitter上のリスナーのリアクションを楽しみたい！  
 という想いから作成しました。  
<br>
深夜ラジオはだいたい午前１時から始まります。  
土日ならともかく、平日にリアルタイムで聴くのは何かと体力もいるし次の日の仕事に響いてきます。  
<br>
ただ、リアルタイムで聴くことのメリットとしては、  
<br>
・番組にメールを送れて運が良ければメールが読まれること  
<br>
私自身としては、  
<br>
・同じリスナー同士でTwitterの反応を一緒に楽しめるパブリックビューイング的な要素　　
<br>
これが魅力的に感じます。  
<br>
また、  
<br>
YouTubeなどにもチャット機能やコメント機能があるように、　　
<br>
ラジオにもみんなで　１つの番組を感想の共有や面白いところを分かち合うことがあってもいいんじゃないか  
<br>
と思い、作成しました。

# 使用技術
### バックエンド
- PHP 7.4
- Laravel 6.2
- PHPUnit
- TwitterAPI
- GoogleAPI

### フロントエンド
- jQuery 3.4.1
- MDBootstrap4

### インフラ
- Docker 
- MySQL 8.0
- nginx
- AWS 
 (EC2,Route53,ALB,RDS,S3)

### その他使用ツール
- Visual Studio Code
- draw.io
- Adobe XD
- overflow
- Googleスプレッドシート

### ネットワーク構成図(AWS)
作成ツール：draw.io([リンク](https://drive.google.com/file/d/1q4aVwg29Lpq5st87zcpolVZIY0heMGCR/view?usp=sharing))
![network](https://user-images.githubusercontent.com/75148506/125463321-4e96ed9b-6192-47da-a10b-5c9d9a892a3f.png)
<br>
### ワイヤーフレーム
作成ツール:Adobe XD([リンク](https://xd.adobe.com/view/436413ea-e0db-4b34-a6b3-3fdbc4114f8c-1637/))
![ダウンロード](https://user-images.githubusercontent.com/75148506/125465314-0f936594-c061-4bfb-9acf-ec4a64bb9482.png)
<br>
### 画面遷移図
作成ツール:overflow,Adobe XD([リンク](https://overflow.io/s/B0VX3FUR))
![RadioSns](https://user-images.githubusercontent.com/75148506/125462962-f25531e1-edc6-4a9c-92de-7319f0d6261f.png)
<br>
### DB設計図
作成ツール：draw.io([リンク](https://drive.google.com/file/d/1AXe0giW3gSr_ZJenTI0Jo1LQFCN7XvX4/view?usp=sharing))
![RadioSNS](https://user-images.githubusercontent.com/75148506/125463807-36386bfd-9c9f-4769-a90c-13035055c4f8.png)
<br>
# 機能一覧
### ユーザー関連
- 新規登録機能
- ログイン、ログアウト機能
- Googleログイン

### TwitterAPI
- Twitterのつぶやきを取得  
 (日付・時間に合わせたつぶやきを取得)
 
### 番組関連
- 番組一覧、番組作成、削除、編集（CRUD)　　
- コメント機能
- 画像アップロード（S3)
- いいね機能

### マイページ
- ユーザー編集（メールアドレス、パスワード）機能
- 自身が作成した番組の一覧表示
- 自身がいいねした番組の一覧表示

### フラッシュメッセージ
- ログイン・ログアウト、登録、番組作成・編集・削除の際にフラッシュメッセージの表示

### PHPUnitテスト

### 開発手法
- MVCをベースに作成
- リポジトリパターンを実装


