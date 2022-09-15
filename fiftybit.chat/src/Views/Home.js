import React from "react";

import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link
  } from "react-router-dom";

function Home() {
    return (
<div className="forum_box">
<h1>Welcome to Fiftybit.Chat</h1>
    <ul>
    <li>
    <Link to = "/general-discussion">General Discussions</Link>
    </li>
    <li>
    <Link to = "/art">Art</Link>
    </li>
    <li>
    <Link to = "/development-and-software">Development and Software</Link>
    </li>
    <li>
    <Link to = "/film-and-television">Film and Television</Link>
    </li>
    <li>
    <Link to = "/gaming">Gaming</Link>
    </li>
    <li>
    <Link to = "/hobbies-and-diy">Hobbies and DIY</Link>
    </li>
    <li>
    <Link to = "/meta">Meta</Link>
    </li>
    <li>
    <Link to = "/politics">Politics</Link>
    </li>
    <li>
    <Link to = "/videos">Videos</Link>
    </li>
    <li>
    <Link to = "/music">Music</Link>
    </li>
</ul>
</div>
    )
}

export default Home;