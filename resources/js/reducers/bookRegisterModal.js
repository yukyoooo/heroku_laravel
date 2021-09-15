import { TOGGLE_BOOK_REGISTER_MODAL } from "../Actions";

const initialState={
    visibility: false,
    index: 0,
}
const BookRegisterModal = (state = initialState , action ) => {
    switch (action.type){
        case TOGGLE_BOOK_REGISTER_MODAL:
            return {
                ...state,
                visibility: action.payload,
                index: action.index,
            };
        default:
            return state;
    };
};

export default BookRegisterModal;
