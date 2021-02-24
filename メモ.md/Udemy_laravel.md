## laravelのインストール
1. 該当フォルダへ移動する
2. laravelのバージョン6.0をインストールする
    ```
    composer create-project laravel/laravel <laravelフォルダ名> --prefer-dist "6.0.*"
    ```
3. サーバ起動
    ```
    php artisan serve
    ```

## laravel初期設定
- タイムゾーン/言語設定
    - config/app.php
        - 'timezone' => 'Asia/Tokyo'
        - 'local' => 'ja'
```
/*
|--------------------------------------------------------------------------
| Application Timezone
|--------------------------------------------------------------------------
|
| Here you may specify the default timezone for your application, which
| will be used by the PHP date and date-time functions. We have gone
| ahead and set this to a sensible default for you out of the box.
|
*/

// 'timezone' => 'UTC',
'timezone' => 'Asia/Tokyo',

/*
|--------------------------------------------------------------------------
| Application Locale Configuration
|--------------------------------------------------------------------------
|
| The application locale determines the default locale that will be used
| by the translation service provider. You are free to set this value
| to any of the locales which will be supported by the application.
|
*/

// 'locale' => 'en',
'locale' => 'ja',
```
- データベースの文字コード
    - config/database.php
        - 'charset'=>'utf8'
```
'mysql' => [
    'driver' => 'mysql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    // 'charset' => 'utf8mb4',
    'charset' => 'utf8',
    // 'collation' => 'utf8mb4_unicode_ci',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
],
```
- データベース設定
    - .envのDB_DATABASE,DB_USERNAME,DB_PASSWORDを任意の情報記入する
    - マイグレーションする
        - `php artisan migrate`
- デバックバーのインストール
    - .envのDEBUGで表示切替えできる
    - キャッシュクリアすると反映される
        - `php artisan cache:clear`
        - `php artisan config:clear`
```
composer require barryvdh/laravel-debugbar
```
- エラーメッセージの日本語化

## 