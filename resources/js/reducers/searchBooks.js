import {
    FETCH_BOOKS_REQUEST,
    FETCH_BOOKS_SUCCESS,
    FETCH_BOOKS_FAILURE,
} from '../Actions';

const initialState = {
    loading: false,
    searchWord: '',
    books: [],
    post: null,
    error: null,
};

const searchBooks = (state = initialState, action) => {
    switch(action.type) {
        case FETCH_BOOKS_REQUEST:
            return {
                ...state,
                loading: true,
                searchWord: action.searchWord,
            };
        case FETCH_BOOKS_SUCCESS:
            return {
                ...state,
                loading: false,
                books: action.payload,
                lastUpdatedAt: action.date,
            };
        case FETCH_BOOKS_FAILURE:
            return {
                ...state,
                loading: false,
                error: action.error,
            };
        default:
            return state;
    }
}

export default searchBooks;
