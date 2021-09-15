import React from 'react';

export default class Header extends React.Component {
    handleChange(e) {
        const title = e.target.value;
        this.props.changeTitle(title);
    }

    render() {
        console.log(this.props);
        return (
            <header>
                <h2>{ this.props.title }</h2>
                <input value={this.props.title} onChange={this.handleChange.bind(this)} />
            </header>
        )
    }
}
