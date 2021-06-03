# Portfolio_RadioSns
# Portfolio_RadioSns環境構築

## Description
Dockerを利用した開発環境
- PHP7.4
- Laravel 6.2
- MySQL8.0
- nginx
- node



## Usage
### Git clone
```
$ git clone https://github.com/Yuichi-Iizuka/Portfolio＿RadioSns
```
###　設定ファイル(.env)を生成
```
cp backend/.env.example backend/.env
```

### Docker compose build
```
$ docker-compose up -d
```
### Permission deniedが出た場合
```
docker-compose exec app chown www-data:www-data storage -R
docker-compose exec app chown www-data:www-data bootstrap/cache -R
```

＃＃＃No application encryption keyが出た場合
｀｀｀
docker-compose exec app php artisan key:generate
｀｀｀

### Migration
```
$ docker-compose exec app sh
$ php artisan migrate
```

### Setup Frontend
#### NPM
```
$ docker-compose run nodejs npm install
$ docker-compose run nodejs npm run dev
```

