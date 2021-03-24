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

--------------------------------------------------------------
[react-router-dom](https://qiita.com/k-penguin-sato/items/e46725edba00013a8300)
1. navbarに
```js:Navbar.js
import React from 'react'
import { Link } from 'react-router-dom'

class Navbar extends React.Component {
    render(){
        return(
            <div>
                <link to="/">Home</link>
                <link to="/About">About</link>
            </div>
        )
    }
}
export default Navbar;
```
2.app.jsを作成
```js:App.js
import React, { Component } from 'react';
import { BrowserRouter as Router, Route } from 'react-router-dom';
import Navbar from './Navbar';
import About from './About';
import Home from './Home';

class App extends Component {
  render() {
    return (
      <div className="App">
        <Router>
          <div>
            <Navbar /><hr/>
            <Route exact path='/' component={Home}/>
            <Route path='/About' render={ () => <About name={'Tom'}/> }/>
          </div>
        </Router>
      </div>
    );
  }
}
export default App;
```

3. About.jsとhome.jsを作成
```js:About.js
import React from 'react'

class About extends React.Component {
  render(){
    return(
      <div>
        <h1>About</h1>
        <h2>I am {this.props.name}</h2>
      </div>
    )
  }
}
export default About;
```
--------------------------------
## [propsとstateとは](https://qiita.com/rio_threehouse/items/7632f5a593cf218b9504)
- props: 親コンポーネントから子コンポーネントへ値を渡すための仕組み
    - コンポーネントの親子関係
        - 親：コンポーネントを利用する側
        - 子：コンポーネントを利用される側
    - propsの使い方
        - 子コンポーネント：親から値をもらいたいところにpropsを定義する
        - 親コンポーネント：子コンポーネント呼び出し時に、子に渡したい値を設定する
    - propsで渡せる値
        - 文字列・スタイル・イベント
    - propsを使う利点
        - １つのコンポーネントを様々なシチュエーションで利用することができる→コンポーネントの再利用性が高まる
        - 1つの子コンポーネントで親コンポーネントで色々なことができる
    - propsの注意点
        - 子から親へ値を渡すことはできない
        - propsの値を動的に変更することはできない
- state: 各コンポーネントごとに持つ、コンポーネントの状態を管理する仕組み
    - stateの使い方
        1. stateの初期値を設定する
        2. this.setState()にstateを変化させたい処理を書く
        3. stateを更新すると、必要なコンポーネントが自動で再読み込みされる
