import './App.css';
import { Link } from "react-router-dom";
import { useState, useEffect } from "react";

export function Home() {
  return (
  <div>
    <nav>
      <ul>
      <li><Link to = "/general-discussion">General Discussions</Link></li>
      <li><Link to = "/thread">Test Thread</Link></li>
      </ul>
    </nav>
    <h1>Here is the home page.</h1>
  </div>
  );
}
export function General_discussion() {

  const [data, getData] = useState(null);
  useEffect(() => {
    fetch(`http://localhost/Projects/fiftybit-chat/api/posts.php?subforum=1`
    )
    .then((response) => response.json())
    .then((response) => {
      getData(response);
    });
  }, []);
  console.log(data)

  return (
  <div>
    <nav>
      <ul>
        <li><Link to = "/">Home</Link></li>
        <li><Link to = "/thread">Test Thread</Link></li>
      </ul>
    </nav>
    <h1>Here is page for subforum 1.</h1>
    <pre>{JSON.stringify(data, null, 2)}</pre>
  </div>
  );
}
export function Thread() {

  return (
  <div>
    <nav>
      <ul>
        <li><Link to = "/">Home</Link></li>
        <li><Link to = "/general-discussion">General Discussions</Link></li>
      </ul>
    </nav>
    <h1>Here is a thread with your specified number.</h1>
  </div>
  );
}

 export function App() {
  return (
    <Home />
  );
}

// export default App;
