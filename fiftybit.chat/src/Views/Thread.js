import React, {Component, useEffect, useState} from "react";
import { useSearchParams } from 'react-router-dom';
import axios from "axios";


function Thread() {

        const [queryString] = useSearchParams();
        // console.log(queryString.get('post-id'));
        const post_id = queryString.get('post-id')

        const [threadPosts, setThreadPosts] = useState([])
        const [threadReplies, setThreadReplies] = useState([])
        const [isLoading, setIsLoading] = useState(false);

          function getPosts() {
              setIsLoading(true);
              axios.get("http://localhost/Projects/fiftybit-chat/api/getPost.php?post-id="+post_id)
                  .then(response => response.data)
                  .then((data) => {
                      setThreadPosts(data)
                      setIsLoading(false);
                  });
          }
          useEffect(()=>{
              getPosts();
          },[])
        
          function getReplies() {
              setIsLoading(true);
              axios.get("http://localhost/Projects/fiftybit-chat/api/getReplies.php?post-id="+post_id)
                  .then(response => response.data)
                  .then((data) => {
                      setThreadReplies(data)
                      setIsLoading(false);
                  });
          }
          useEffect(()=>{
              getReplies();
          },[])

          

    return (
        <div>
            <h1>Thread Placeholder</h1>
            {isLoading ? <h1>Loading Post...</h1> :
                         threadPosts.map(threadPosts =>
                            <div className = "post_container" key = { threadPosts.post_id }>
                                <h2>{ threadPosts.post_title }</h2>
                                <p>{ threadPosts.post_content }</p>
                                <h3><a href={ threadPosts.post_hotlink }>Hotlink</a></h3>
                                <p>❤ {threadPosts.emote_like} |😆 {threadPosts.emote_funny} |🙁 {threadPosts.emote_sad} |🤔 {threadPosts.emote_interesting} |🎟  {threadPosts.emote_bit}</p>
                            </div>)
            }
            {isLoading ? <h1>Loading Replies...</h1> :
                         threadReplies.map(threadReplies =>
                            <div className = "reply_container" key = { threadReplies.reply_id }>
                                <h3>{ threadReplies.reply_content }</h3>
                                <p>❤ {threadReplies.emote_like} |😆 {threadReplies.emote_funny} |🙁 {threadReplies.emote_sad} |🤔 {threadReplies.emote_interesting} |🎟  {threadReplies.emote_bit}</p>
                            </div>)
            }
            
            
        </div>
    )
}

export default Thread;