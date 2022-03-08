import React, {Component} from 'react'

export default class CounterDisplay extends Component {
    constructor() {
        super();
        this.state = {
            counter: 0,
            unique_clickers: 0,
        }
    }

    render() {
        const {counter} = this.state;

        return (
            <div className='counter-display'>
                <span className='heading text-primary'>{counter}</span>
                <br />
                <span className='details'>Clicks today. With {0} unique clickers</span>
            </div>
        )
    }
}
