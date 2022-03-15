import { configureStore } from "@reduxjs/toolkit";
import { reducer as counterReducer } from "./slices/counter";

export default configureStore({
  reducer: {
    counter: counterReducer
  }
});
