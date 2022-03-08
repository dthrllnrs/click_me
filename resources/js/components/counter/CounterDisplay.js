import React, {Component} from 'react'

export default class CounterDisplay extends Component {
    constructor() {
        super();
        this.state = {
            counter: 0,
        }
    }

    render() {
        const {counter} = this.state;

        return (
            <div className='counter-display'>
                <span className='heading'>{counter}</span>
            </div>
        )
    }
}
