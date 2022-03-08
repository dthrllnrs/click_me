import React, {Component} from 'react'

export default class IncrementButton extends Component {
    constructor() {
        super();
        this.state = {
            counter: 0,
        }
    }

    render() {
        const {counter} = this.state;

        return (
            <button className='btn primary lg'>Click Me!</button>
        )
    }
}
