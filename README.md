# 参考

https://noumenon-th.net/programming/2020/11/05/many-to-many/

# Laravelインストール

```
composer create-project laravel/laravel Laravel_Many_to_Many
```

# 画面表示できるか確認

```
php artisan serve --port=8080
```

# BookとTagのモデルとマイグレーションファイルを作成

```
 php artisan make:model Book --migration
 php artisan make:model Tag --migration
```

# 中間テーブルのマイグレーションファイルを作成

```
php artisan make:migration create_book_tag_table
```

# MySQLログイン

```
mysql -u root -p
```

# DBの作成

```
create database Laravel_Many_to_Many
```

# 「.env」ファイルの作成とAPP_KEYの生成

```
cp .env.example .env
php artisan key:generate
```

# .envファイルの修正

```
// .envファイルに自身のローカルのMySQLのパスワードとDB名をいれる
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Laravel_Many_to_Many
DB_USERNAME=root
DB_PASSWORD=パスワード
```

# キャッシュの消去とMySQLの再起動

```
php artisan config:cache
mysql.server restart
```
# マイグレーションを実行

```
php artisan migrate
```

# コントローラーファイルを作成

```
php artisan make:controller BookController --resource
php artisan make:controller TagController --resource
```

# 

```

```

# 

```

```

# 

```

```