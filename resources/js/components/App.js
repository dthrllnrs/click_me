import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import IncrementButton from './counter/IncrementButton'
import CounterDisplay from './counter/CounterDisplay'
import '../assests/sass/app.scss';
import { Provider } from 'react-redux'
import store from '../stores/store';


class App extends Component {
    render () {
    return (
        <div className='main-container'>
            <CounterDisplay />
            <IncrementButton />
        </div>
    )
    }
}

ReactDOM.render(
    <Provider store={store}>
        <App />
    </Provider>,
    document.getElementById('app'))
