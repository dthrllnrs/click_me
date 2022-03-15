import React, {Component, useEffect} from 'react'
import { useDispatch, useSelector } from "react-redux";
import { fetchInitial } from '../../stores/slices/counter';

export default () => {

    const dispatch = useDispatch();
    const {clicks, unique_clicks} = useSelector(state => state.counter);

    useEffect(() => {
        dispatch(fetchInitial());
    }, [dispatch]);

    return (
        <div className='counter-display'>
            <span className='heading text-primary'>{clicks}</span>
            <br />
            <span className='details'>Clicks today. With {unique_clicks} unique {unique_clicks > 1 ? 'clickers' : 'clicker'}</span>
        </div>
    )
}
