import React from "react";
import Home from "../Views/Home";
import Art_Posts from "../Views/Art";
import General_Posts from "../Views/General_Discussion"
import Dev_Posts from "../Views/Development_and_Software";
import FilmTV_Posts from "../Views/Film_and_Television";
import Gaming_Posts from "../Views/Gaming";
import Hobby_Posts from "../Views/Hobbies_and_DIY";
import Meta_Posts from "../Views/Meta";
import Politics_Posts from "../Views/Politics";
import Video_Posts from "../Views/Videos";
import Music_Posts from "../Views/Music";
import Thread from "../Views/Thread";
import Header from "./Header";

import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link
  } from "react-router-dom";

//Probably wise once all these pages and gateways are working, leave this navbar component to only output the navbar for logins and stuff, and then move the "box"
// for the subforums to their own component on the home page?

function Navbar() {
    return (
<Router>
    <nav>
    <Header />
        <ul>
            <li>
                <Link to = "/">Home</Link>
            </li>
        </ul>
    </nav>
    <Routes>
        <Route path = "/" element = { <Home />} exact />
        <Route path = "/general-discussion" element = { <General_Posts />} exact />
        <Route path = "/development-and-software" element = { <Dev_Posts />} exact />
        <Route path = "/film-and-television" element = { <FilmTV_Posts />} exact />
        <Route path = "/gaming" element = { <Gaming_Posts />} exact />
        <Route path = "/hobbies-and-diy" element = { <Hobby_Posts />} exact />
        <Route path = "/meta" element = { <Meta_Posts />} exact />
        <Route path = "/politics" element = { <Politics_Posts />} exact />
        <Route path = "/videos" element = { <Video_Posts />} exact />
        <Route path = "/music" element = { <Music_Posts />} exact />
        <Route path = "/art/*" element = { <Art_Posts />} exact />
            <Route path =  "/thread/" element = { <Thread />} />
    </Routes>

</Router>




    )
}

export default Navbar;