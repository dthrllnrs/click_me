import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import IncrementButton from './counter/IncrementButton'
import CounterDisplay from './counter/CounterDisplay'
import '../assests/sass/app.scss';

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

ReactDOM.render(<App />, document.getElementById('app'))
