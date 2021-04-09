import React from 'react';

class Lesson extends React.Component{
    constructor(props){
        super(props);
        this.state = {isModalOpen: false};
    };

    handleClickLesson(){
        this.setState({isModalOpen:true});
    }
    handleClickClose(){
        this.setState({isModalOpen:false});
    }

    render(){
        let modal;
        if (this.state.isModalOpen){
            modal=(
                <div className="modal">
                    <h1>モーダルです</h1>
                    <h2>{this.props.name}</h2>
                    <p>{this.props.introduction}</p>
                    <button
                        className="modal-close-btn"
                        onClick={()=>{this.handleClickClose()}}
                    >閉じる</button>
                </div>
            )
        }
        return(
            <div className="lesson-card">
                <div className="lesson-item">
                    {/* <p>{this.props.name}</p>
                    <img src ={this.props.image}/>
                    <p>{this.props.introduction}</p> */}
                    <button onClick={()=>{this.handleClickLesson()}}>モーダル</button>
                    {modal}
                    <button
                        className="modal-close-btn"
                        onClick={()=>{this.handleClickClose()}}
                    >閉じる</button>
                </div>
            </div>
        )
    }
}

export default Lesson;
