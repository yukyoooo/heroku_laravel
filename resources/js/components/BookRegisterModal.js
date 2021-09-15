import { connect } from 'react-redux';
import Rodal from 'rodal';
import 'rodal/lib/rodal.css';
import { bookRegisterModal } from '../Actions';


const BookRegisterModal = (props) =>{

    return (
        <Rodal
        visible={props.visibility}
        onClose={props.close}
        animation={'zoom'}
        >
            {console.log(props.visibility)}
            {console.log(props.index)}
            <h4>プロフィール</h4>
            {/* <h5>{props.visibility}</h5> */}
                <div>
                    <button
                        type="button"
                        className="btn btn-primary"
                        // onClick={props.fetchProfileWithPrompt}
                    >更新</button>
                </div>
        </Rodal>
    );
}

const mapState = (state) => {
    return {
        visibility: state.bookRegisterModal.visibility,
        index: state.bookRegisterModal.index,
        searchedBooks: state.searchBooks.books,
    };
};
const mapDispatch = (dispatch) => {
    return {
        close: () => dispatch(bookRegisterModal(false, 0)),
    };
};
export default connect(mapState, mapDispatch)(BookRegisterModal);
