import { useEffect } from 'react';
import { connect } from 'react-redux';
import Rodal from 'rodal';
import 'rodal/lib/rodal.css';
import { bookRegisterModal, getUserTags } from '../Actions';


const BookRegisterModal = (props) =>{

    return (
        <Rodal
        visible={props.visibility}
        onClose={props.close}
        animation={'zoom'}
        height={620}
        width={700}
        >
            <h5>新規登録</h5>
            {console.log('usersの出力結果')}
            {console.log(props.users)}
            {console.log(props.tags)}

            <div className="mb-3">
                <label className="form-label">PPTのPDF(必須)</label>
                <input className="form-control" type="file" id="formFile" name="slides_pdf" />
            </div>
            <div className="mb-3">
                <label className="form-label">学んだこと</label>
                <textarea type="text" name="book_output" className="form-control">
                </textarea>
            </div>

            <div className="mb-3">
                <label className="form-label">タグ</label>
                <div className="d-flex flex-row">
                    {props.tags.map((tag, index) =>
                        (
                            <div key={index} className="form-check flex-fill">
                                <input className="form-check-input" name="tags[]" type="checkbox" value={tag.name} id="flexCheckDefault" />
                                <label className="form-check-label">{tag.name}
                                </label>
                            </div>
                        )
                    )}
                </div>
            </div>
            <div className="mb-2">
                <select className="form-select" aria-label="Default select example">
                    <option selected>投稿者を選んでください</option>
                    {props.users.map((user, index) =>
                        (
                            <option key={index} value={user.name}>{user.name}</option>
                        )
                    )}
                </select>
            </div>
            <p className="small text-muted font-weight-normal">------------------------------------以下自動取得------------------------------------</p>
            <div className="d-flex flex-row">
                <div className="mb-3 flex-fill">
                    <label className="form-label">タイトル</label>
                    <input className="form-control" value={props.visibility && props.books[props.index].volumeInfo.title} type="text" name="book_title" />
                </div>
                <div className="mb-3 ml-2 flex-fill">
                    <label className="form-label">概要</label>
                    <input className="form-control" value={props.visibility ? props.books[props.index].volumeInfo.description : ''} type="text" name="book_detail" />
                </div>
            </div>
            <div className="d-flex flex-row">
                <div className="mb-3 flex-fill">
                    <label className="form-label">著者</label>
                    <input className="form-control" value={props.visibility && props.books[props.index].volumeInfo.authors.join('.  ')} type="text" name="book_author" />
                </div>

                <div className="mb-3 ml-2 flex-fill">
                    <label className="form-label">出版日</label>
                    <input className="form-control" value={props.visibility ? props.books[props.index].volumeInfo.publishedDate : ''} type="text" name="book_publishedDate"/>
                </div>
            </div>
                <div>
                    <button
                        type="button"
                        className="btn btn-primary"
                        onClick={props.getUserTags}
                    >登録</button>
                </div>
        </Rodal>
    );
}

const mapState = (state) => {
    return {
        visibility: state.bookRegisterModal.visibility,
        index: state.bookRegisterModal.index,
        searchedBooks: state.searchBooks.books,
        users: state.getUserTags.users,
        tags: state.getUserTags.tags,
    };
};
const mapDispatch = (dispatch) => {
    return {
        close: () => dispatch(bookRegisterModal(false, 0)),
    };
};
export default connect(mapState, mapDispatch)(BookRegisterModal);
