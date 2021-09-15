import { EDIT_VALUE } from "../Actions";

const initialForm = { text: ""};
const form = (state = initialForm, action) => {
    switch (action.type) {
        case EDIT_VALUE:
            return {
                ...state,
                [action.name]: action.value,
            };
        default:
            return state;
    }
};

export default form;
