import React, {Component, useEffect, useState} from "react";
import { useSearchParams } from 'react-router-dom';
import axios from "axios";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link
  } from "react-router-dom";


function Meta_Posts() {
    
        const [Posts, setPosts] = useState([])
        const [isLoading, setIsLoading] = useState(false);

          function getPosts() {
              setIsLoading(true);
              axios.get("http://localhost/Projects/fiftybit-chat/api/posts.php?subforum=4")
                  .then(response => response.data)
                  .then((data) => {
                      setPosts(data)
                      setIsLoading(false);
                  });
          }
          useEffect(()=>{
              getPosts();
          },[])

    return (
        <div>
            <h1>Meta</h1>
            {isLoading ? <h1>Loading Post...</h1> :
                         Posts.map(Posts =>
                            <div className = "post_container" key = { Posts.post_id }>
                                <h2>{ Posts.post_title }</h2>
                                <p>❤ {Posts.emote_like} |😆 {Posts.emote_funny} |🙁 {Posts.emote_sad} |🤔 {Posts.emote_interesting} |🎟  {Posts.emote_bit}</p>
                                <strong className = "read_more"><Link to ={'/thread?post-id=' + Posts.post_id}>Read More:</Link></strong>
                            </div>)
            }
        </div>
    )
}

export default Meta_Posts;



