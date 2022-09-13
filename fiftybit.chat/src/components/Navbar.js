import React from "react";
import Home from "../page-components/Home";
import Posts from "../page-components/Posts";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link
  } from "react-router-dom";

function Navbar() {
    return (
<Router>
        <ul>
            <li>
                <Link to = "/">Home</Link>
            </li>
            <li>
                <Link to = "/general-discussion">General Discussions</Link>
            </li>
            <li>
                <Link to = "/art">Art</Link>
            </li>
        </ul>

    <Routes>
        <Route path = "/" element = { <Home />} exact />
        <Route path = "/general-discussion" element = { <Posts subforum_id = "General-Discussion" />} exact />
        <Route path = "/art" element = { <Posts subforum_id = "Art" />} exact />
    </Routes>

</Router>




    )
}

export default Navbar;