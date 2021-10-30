import {
    FETCH_USERS_TAGS_REQUEST,
    FETCH_USERS_TAGS_SUCCESS,
    FETCH_USERS_TAGS_FAILURE,
} from '../Actions';

const initialState = {
    loading: false,
    users: [],
    tags: [],
    error: null,
};


const getUserTags = (state = initialState, action) => {
    switch(action.type) {
        case FETCH_USERS_TAGS_REQUEST:
            return {
                ...state,
                loading: true,
            };
        case FETCH_USERS_TAGS_SUCCESS:
            return {
                ...state,
                loading: false,
                users: action.payload.data.user,
                tags: action.payload.data.tags,
            };
        case FETCH_USERS_TAGS_FAILURE:
            return {
                ...state,
                loading: false,
                error: action.error,
            };
        default:
            return state;
    }
}

export default getUserTags;
