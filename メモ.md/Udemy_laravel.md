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

## モデル(model)DBとやりとり
- DBとのやりとりをPHPで書ける
`php artisan make:model Models/Test`
`php artisan make:model Models/Test -mc`
    - migrationとコントローラーファイルをまとめて作成可能

## Migration
- DBテーブルの履歴管理
1. `php artisan make:migration create_tests_table`
2. テーブル内容を構成
3. `php artisan migrate`で生成
- モデルは単数形、マイグレーションは複数形
- 既存のテーブルに追加する場合
    `php artisan make:migration add_votes_to_users_table --table=users`
- `php artisan migrate:status` :migrateファイルの確認
- `php artisan migrate:rollback` :1個前に戻る
- `php artisan migrate` を実行すると取消多分すべて再度実行

## laravel tinker
- DBと簡単につながる仕組み
```php:php artisan tinker
$test = new App\Models\Test;
$test->text = "aaa";
$test->save();
App\Models\Test::all();
```

## コントローラー(処理)
`php artisan make:controller TestController`
- ファイル名のあとにcontrollerをつける
- app/Http/Controllers/TestController.php

## MVCモデル記述方法
1. routeのweb.phpで`Route::get('tests/test', [TestController::class, 'index']);`を記述すると、tests/testにアクセスがきたらtestControllerのindexを実行
2. TestController.phpでviewの接続先を設定
```php
public function index()
    {
        return view('tests.test');
    }
```
3. viewを作成する
4. tests/testにアクセスする

## ヘルパ関数
- よく使うヘルパ関数
    - route, auth, app, bcrypt, collect, dd, env, factory, old, view, など

## コレクション
- データベースからデータ取得時はコレクション型になっている
    - コレクション型関数多数、メソッドチェーンで記述可能
        - all, chunk, get, pluck, whereIn, toArray
`$values = Test::all();`
## クエリビルダ
- データベースアクセスをSQLではなくPHP構文でかける
- collectionの使い分け、
    - 簡単にデータ取得はコレクション、細かい条件を指定する場合はクエリビルダ
`$tests = DB::table('tests')->select('id')->get();`

## ファサード
- 入口
- select, where, groupbyなどsqlに近い構文
- config/app.phpのproviderとaliasesに設定している
- `use Illuminate\Support\Facades\@@:`で使えるようになる

## laravel起動処理DIとサービスコンテナ
- [参考資料](https://qiita.com/namizatork/items/801da1d03dc322fad70c)
- public/index.phpが最初にアクセスされるファイル
- 

## blade
- {{}}記法はXSS攻撃を防ぐhtmlspecialchar関数を通している
- @csrfを書くことで対策可能
- レイアウト分割
    - @extends('layouts.app')で呼び出し可能

## フロントエンド
- node(パッケージ管理:), webpack(バンドル:複数を1つに), bablel(コンパイル:読み込めるがたに変換)
- laravelのフロントエンド
    - laravel-ui:bootstrap
    - laravel-mix:webpackのラッパー
    - webpack.mix.js:laravel-mixの設定ファイル
        ```js
        mix.js('resources/js/app.js', 'public/js')
        .react()
        .sass('resources/sass/app.scss', 'public/css');
        ```
    - Node.js/npm:別途インストール
    - package.json:設定管理ファイル

## laravel-uiと認証
- マニュアルのフロントエンド/スカフォールド
- laravel-uiのインストール
    - `composer require laravel/ui:^1.0 --dev`
- フロントエンド選択
    - `php artisan ui react --auth`
    - `npm install && npm run dev`
    - app/http/authとuser.phpにauth関連ファイルが生成される

## エラーメッセージ日本語化

## routeの確認
`php artisan route:list > route.txt`

### 簡易アプリ制作
1. modelとmigration作成
2. controllerの作成 --resource追加するとREST構文がはいる
3. route設定
4. view作成

## バリデーション
`php artisan make:request StoreContactForm`
app\Http\request\StoreContactForm.php
- authorizeをtrueに
- コントローラーでuseする
`use App\Http\Requests\StoreContactForm;`
- storeの引数を書き換える
`public function store(StoreContactForm $request)`
- viewにエラー表示内容を記述
```php
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
```

## seeder
`php artisan make:seeder UsersTableSeeder`
database\seeders\UsersTableSeeder.phpに記述
- table毎に書く必要がある
```
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
...

DB::table('users')->insert([
            'name' => 'ああああああ',
            'email' => 'test@test.com',
            'password' => Hash::make('password123'),
        ],[
            'name' => str::random(10),
            'email' => 'test2@test.com',
            'password' => Hash::make('password123'),
        ])
```
- DatabaseSeeder.phpに下記を加える
`$this->call(UsersTableSeeder::class);`
- composer autoloadを実行
`composer dump-autoload`
- seedを実行
`php artisan db:seed`
`php artisan migrate:refresh --seed` DBリセットとseed実行の場合
- 

## seed factory 大量データ生成
`php artisan make:factory ContactFormFactory`
- app/config/app 100行目
`faker_locale' => 'ja_JP',`
- 生成されたファクトリファイルで下記のように追記
```
return [
            //
            'your_name' => $this->faker->name,
            'title' => $this->faker->realText(50),
            'email' => $this->faker->unique()->email,
            'url' => $this->faker->url,
            'gender' => $this->faker->randomElement(['0', '1']),
            'age' => $this->faker->numberBetween($min = 1, $max=6),
            'contact' => $this->faker->realText(200),
        ];
```
- seeder作成
`php artisan make:seeder ContactFormSeeder`
- 生成されたファイルにfactoryを追記
`factory(ContactForm::class, 200)->create();`
`use App\Models\ContactForm;`


