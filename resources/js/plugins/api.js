export default axios.create({
    baseURL: "http://click_me.test/api",
    withCredentials: false,
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
});
