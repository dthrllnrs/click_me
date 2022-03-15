import React, {Component} from 'react';
import { useSelector, useDispatch } from "react-redux";
import { increment } from '../../stores/slices/counter';

export default () => {
    const dispatch = useDispatch();
    return (
        <button className='btn primary lg' onClick={() => dispatch(increment())}>Click Me!</button>
    )
}
