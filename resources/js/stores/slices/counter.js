import { createSlice } from '@reduxjs/toolkit'
import api from '../../plugins/api';

const slice = createSlice({
    name: 'counter',
    initialState: {
        clicks: 0,
        unique_clicks: 0
    },
    reducers: {
        setData: (state, {payload}) => {
            state.clicks = payload.daily_clicks.clicks;
            state.unique_clicks = payload.unique_clickers;
        },
    },
});

const { setData } = slice.actions

export const fetchInitial = () => async dispatch => {
   try {
       await api.get('/daily-click')
           .then((response) => dispatch(setData(response.data.data)))
   }
   catch (e) {
       return console.error(e.message);
   }
}

export const increment = () => async dispatch => {
    await api.post('/daily-click/increment').then((response) => {
        dispatch(setData(response.data.data));
    }).catch(err => {
        console.log(err)
    })
}

export const actions = slice.actions;
export const reducer = slice.reducer;
