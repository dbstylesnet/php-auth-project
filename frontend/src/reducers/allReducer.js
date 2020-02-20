import isLoggedReducer from './isLoggedReducer'

import { combineReducers } from 'redux'

const allReducers = combineReducers({
    isLogged: isLoggedReducer
})

export default allReducers