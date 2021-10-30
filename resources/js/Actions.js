import axios from "axios";

// Action Type
export const EDIT_VALUE = 'form/EDIT_VALUE';
export const TOGGLE_BOOK_REGISTER_MODAL = 'bookRegisterModal/TOGGLE';
export const FETCH_BOOKS_REQUEST = "books/FETCH/request";
export const FETCH_BOOKS_SUCCESS = "books/FETCH/success";
export const FETCH_BOOKS_FAILURE = "books/FETCH/failure";
export const FETCH_USERS_TAGS_REQUEST = "create/FETCH/request";
export const FETCH_USERS_TAGS_SUCCESS = "create/FETCH/success";
export const FETCH_USERS_TAGS_FAILURE = "create/FETCH/failure";

// Action Creators
export const editValue = (name, value) => {
    return { type: EDIT_VALUE, name, value };
}

export const bookRegisterModal = (visibility, index) => {
    return { type: TOGGLE_BOOK_REGISTER_MODAL, payload: visibility, index: index };
}

const requestSearchBooks = (searchWord) => {
    return { type: FETCH_BOOKS_REQUEST, searchWord };
};
const successSearchBooks = (data) => {
    return { type: FETCH_BOOKS_SUCCESS, payload: data, date: new Date() };
};
const failureSearchBooks = (error) => {
    return { type: FETCH_BOOKS_FAILURE, error };
};
export const searchBooks = (searchWord) => {
    return (dispatch) => {
        dispatch(requestSearchBooks(searchWord));
        axios
            .get(`https://www.googleapis.com/books/v1/volumes?q=${searchWord}`)
            .then((response) => {
                dispatch(successSearchBooks(response.data.items));
                console.log('GoogleBookApi取得に成功しました。　検索ワード：'+searchWord);
                console.log(response.data.items);
            })
            .catch((error) => {
                dispatch(failureSearchBooks(error));
            });
    };
};

const requestUserTags = () => {
    return { type: FETCH_USERS_TAGS_REQUEST};
}
const successUserTags = (data) => {
    return { type: FETCH_USERS_TAGS_SUCCESS, payload: data};
}
const failureUserTags = (error) => {
    return { type: FETCH_USERS_TAGS_FAILURE, error };
}
export const getUserTags = () => {
    return (dispatch) => {
        dispatch(requestUserTags());
        axios
            .get('/api/posts')
            .then(response => {
                dispatch(successUserTags(response));
                console.log('Usersとtagsのデータを取得しました。');
                console.log(response);
            })
            .catch(error => {
                dispatch(failureUserTags(error));
            })
    }
}
