import React from 'react';

class HandleClick extends React.Component{
    constructor(props){
        super(props);
        this.state = {count: 0};
    }

    handleClick(){
        this.setState({count:this.state.count + 1})
    }

    render(){
        return (
            <div>
                <h3>
                    {this.state.count}
                </h3>
                <button onClick={()=>{this.handleClick()}}>+</button>
            </div>
        )
    }
}

export default HandleClick;
