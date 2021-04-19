import React from 'react';
import HandleClick from './HandleClick';
import Language from './Language';


// const Top = () => {
//     return <h1>TopPage</h1>
// }
class Top extends React.Component{
    // stateの定義はconstructorの中でオブジェクトとして定義
    constructor(props){
        super(props);
        this.state = {name:'にんじゃわんこ'};
    }
    render(){
        const text="top page";
        const languageList = [
            {
                name: 'HTML & CSS',
                image: 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/react/html.svg'
            },
            {
                name: 'JavaScript',
                image: 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/react/es6.svg'
            },
            {
                name: 'React',
                image: 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/react/react.svg'
            },
            {
                name: 'Ruby',
                image: 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/react/ruby.svg'
            },
            {
                name: 'Ruby on Rails',
                image: 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/react/rails.svg'
            },
            {
                name: 'Python',
                image: 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/react/python.svg'
            }
        ];
        return(
            <div>
                <h2>{text}</h2>
                <p>こんにちは、{this.state.name}さん！よろしく！！！</p>
                {/* setState:プロパティを変更する関数 */}
                <button onClick={ ()=> {this.setState({name:'ひつじ仙人'})}}>ひつじ仙人</button>
                <button onClick={ ()=> {this.setState({name:'にんじゃわんこ'})}}>にんじゃわんこ</button>
                <HandleClick/>
                <h3>言語一覧</h3>
                <div className="language">
                    {languageList.map((languageItem) => {
                        return(
                            <Language
                                name = {languageItem.name}
                                image = {languageItem.image}
                            />
                        )
                    })}
                </div>
            </div>
        )
    }
}

export default Top;
