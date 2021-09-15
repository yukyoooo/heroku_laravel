import {combineReducers} from 'redux';
import searchBooks from './searchBooks';
import form from './form';
import bookRegisterModal from './bookRegisterModal';

export default combineReducers({
    searchBooks,
    form,
    bookRegisterModal,
})
