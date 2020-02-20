import { loginReducer } from './reducers'
import { combineReducers } from 'redux'

const reducers = combineReducers({
    loginReducer: loginReducer,
})

export { reducers }