# react学習
- [参考youtube](https://www.youtube.com/watch?v=Otrc2zAlJyM&list=PLX8Rsrpnn3IWKz6H5ZEPWBY8AKWwb9qq7&ab_channel=%E3%80%90%E3%81%A8%E3%82%89%E3%82%BC%E3%83%9F%E3%80%91%E3%83%88%E3%83%A9%E3%83%8F%E3%83%83%E3%82%AF%E3%81%AE%E3%82%A8%E3%83%B3%E3%82%B8%E3%83%8B%E3%82%A2%E5%AD%A6%E7%BF%92%E8%AC%9B%E5%BA%A7)

## Reactの基礎知識
- facebook社が開発
- javascriptのライブラリ(フレームワークではない)
- webのUIを作る
    - view(見た目)
    - controller(機能)
    - コンポーネント＝見た目＋機能
    - webはコンポーネントのツリー構造
- React is not SPA
- DOM(Document Object Model)
    - インターフェイス(htmlにアクセスする窓口)
    - HTML構造、見た目、コンテンツを変更
    - 差分描画
        - 変更されたVirtualDomの差分のみを変更する
- jsx
    - javascriptないでHTMLを簡単に記述するための記述
    ```js
    ReactDOM.render(
        <div className={hoge} />
            <h1>hello world!</h1>
        </div>
    )
    ```

## Reactの強み[jsx]を理解しよう
- facebookが開発
- reactの公式ドキュメントではほぼjsxで記述
- 通常のjavascriptでhtmlを記述(dom操作)
```js:通常のjavascript
const fuga = "<h1>hello,world!</h1>"
document.getElementById('hoge').innerHTML = fuga
```
```js:jsx
return(
    <React.fragment>
        <div id ="hoge">
            <h1>hello,world</h1>
        </div>
    </react.fragment>
);
```
- jsxの構文はブラウザは理解できないため、jsx->javascript(ec6)->jacascript(ec5)
- 変更することをトランスパイラと呼ぶ
    - bable, coffeescript, typescript...etc
- jsxの基礎文法
    - reactパッケージのインストールが必要
    `import React from "react"`
    - htmlとほぼ同じ記述(classはclassName)
    - {}内に変数や関数を埋め込める
    - 変数名などすべてキャメルケースで記述するfooBar, className, 
    - 空要素は閉じる
    `<input type="text" id="blankElement" />`
    ```js
    const foo = "<h1>helloworld</h1>"
    const App = () =>{
        return(
            <div id ="hoge" className="fuga">
                {foo}
            </div>
        );
    };
    ```

## create-react-appで環境構築
- create-react-appはreactの開発環境を簡単に構築できるツール
- react開発環境の構築は難しい
- トランスパイルのbabelやバンドラーのwebpackの設定が必要 
- create-react-appの環境構成
    - src: コンポーネントを作るjsファイル
    - public: htmlファイルや設定ファイル
    - build: 本番環境用のファイル
- コマンド集
    - npm run build
    - npm start
    - npm run eject

## reactコンポーネントの作り方
## reactルーターの使い方