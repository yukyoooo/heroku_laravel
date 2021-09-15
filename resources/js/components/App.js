import React from 'react';
import { connect } from 'react-redux';
import { searchBooks, editValue, bookRegisterModal} from '../Actions';
import BookRegisterModal from '../components/BookRegisterModal';



class App extends React.Component {

    handleEdit(e) {
        this.props.editValue('text', e.target.value);
    }

    handleKeypress(e) {
        //it triggers by pressing the enter key
        if (e.keyCode === 13) {
            this.handleClick(e);
        }
    };

    handleClick(e) {
        this.props.searchBooks(e.target.value);
    }

    existBookList (items) {
        if( items.length === 0 ) {
            // 空配列の場合
            return <div><p style={{height:330}}>書籍名を入力してください。</p></div>
        }else {
            return (
                <div>
                    <p>「{ this.props.word }」の検索結果です。読んだ本を選択してください</p>
                    <div className="row ">
                        {items.map((item, index) =>
                            {if(typeof item.volumeInfo.imageLinks !== 'undefined'){
                                return (
                                    <div key={index} className="col-2 selectbooks" style={{marginTop: 30}}>
                                        <button
                                        type="button"
                                        className="btn btn-link"
                                        onClick={() => this.props.showRegisterBookModal(index)}
                                        ><img className="" src={item.volumeInfo.imageLinks.thumbnail} /></button>
                                    </div>
                                )
                            }}
                        )}
                    </div>
                </div>
            );
        };
    };

    render() {
        return (

            <div>
                <BookRegisterModal />
                <div className="input-group mb-3">
                    <span className="input-group-text" id="inputGroup-sizing-default">書籍名</span>
                    {/* <input type="text" class="form-control" name="keyword" aria-label="Sizing example input" value="{{ $books['keyword'] }}" aria-describedby="inputGroup-sizing-default"> */}
                    <input
                        name="keyword"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default"
                        className="form-control"
                    　　type="text"
                    　　value={this.props.form.text}
                    　　onChange={e => this.handleEdit(e)}
                        onKeyDown={e => this.handleKeypress(e)}
                    />
                    <button
                        className="btn btn-outline-secondary"
                        type="submit"
                        id="button-addon2"
                        value={this.props.form.text}
                        onClick={e => this.handleClick(e)}
                    >検索する</button>
                </div>
                { this.existBookList(this.props.searchedBooks)}

            </div>
        )
    }
}

const mapState = (state) => {
    return {
        word: state.searchBooks.searchWord,
        searchedBooks: state.searchBooks.books,
        form: state.form,
    }
};
const madDispatch = (dispatch) => {
    return {
        searchBooks: (searchWord) => {
            dispatch(searchBooks(searchWord))
        },
        editValue: (name, value) =>{
            dispatch(editValue(name, value));
        },
        showRegisterBookModal: (index) => dispatch(bookRegisterModal(true, index)),
    }
}
export default connect(mapState, madDispatch)(App);
// export default App;



