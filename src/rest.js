import React, { useState } from 'react';
import axios from 'axios';
import './App.css'; // Import your CSS file for styling
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faUser, faRobot } from '@fortawesome/free-solid-svg-icons';


function App() {
  const [userInput, setUserInput] = useState('');
  const [conversation, setConversation] = useState([]);

  const sendMessage = async () => {
    // Send user message
    const newUserInput = { role: 'user', message: userInput };
    setConversation(prevConversation => [...prevConversation, newUserInput]);
    setUserInput('');

    // Send user message to the server
    const response = await axios.post('http://localhost:5000/chat', { user_message: userInput });

    // Receive and display chatbot response
    const botResponse = { role: 'bot', message: response.data.bot_response };
    setConversation(prevConversation => [...prevConversation, botResponse]);

    
    
  };

  return (
    <div className="lisa-start-chat-new">
    <div className="header-1">
      <div className="background">
        <div className="filter-sec-">
          <img className="img-0967-1-icon" alt="" src="/img-0967-1@2x.png" />
        </div>
      </div>
      <div className="container">
        <div className="row">
          <div className="col-md-8">
            <b className="h1-headline-sec-">Meet LRAC’s Online Librarian!</b>
            <div />
          </div>
          <div className="col-md-4" />
        </div>
      </div>
      <div className="navigation-bar">
        <div className="home">{`Home `}</div>
        <div className="about">About</div>
        <div className="services">
          <div className="services1">Services</div>
          <img className="drop-down2-icon" alt="" src="/drop-down2@2x.png" />
        </div>
        <div className="resouces">
          <img className="drop-down2-icon1" alt="" src="/drop-down2@2x.png" />
          <div className="resources">Resources</div>
        </div>
        <div className="whats-new">What’s new?</div>
        <div className="chat-bot-wrapper">
          <div className="chat-bot">
            <img
              className="chat-bot-child"
              alt=""
              src="/rectangle-79@2x.png"
            />
            <div className="lisa">LISA</div>
          </div>
        </div>
        <div className="lrac-logo">
          <b className="lrac">LRAC</b>
          <img className="lrac-logo-icon" alt="" src="/lrac-logo@2x.png" />
        </div>
      </div>
    </div>
    <div className="div">
      <div className="col-md-41">
        <b className="h5">Contact US</b>
        <div className="div1">
          <div className="feature-item">
            <img className="bxbx-phone-icon" alt="" src="/bxbxphone@2x.png" />
            <b className="link">+63 32 411 2000 (trunkline)</b>
          </div>
          <div className="feature-item">
            <img className="bxbx-map-icon" alt="" src="/bxbxmap@2x.png" />
            <b className="link">
              N. Bacalso Avenue, CebuCity ,Philippines 6000
            </b>
          </div>
          <div className="feature-item">
            <img
              className="carbonsend-alt-icon"
              alt=""
              src="/carbonsendalt@2x.png"
            />
            <b className="link">info@cit.edu</b>
          </div>
        </div>
      </div>
      <div className="col-md-2">
        <b className="h5">{`Quick Link `}</b>
        <div className="div1">
          <b className="link">cit.edu</b>
          <b className="link">Payment Portal</b>
        </div>
      </div>
      <div className="col-md-21">
        <b className="h5">Get In Touch</b>
      </div>
      <div className="col-md-6">
        <div className="social-media">
          <img
            className="bxbx-phone-icon"
            alt=""
            src="/antdesignfacebookfilled@2x.png"
          />
          <img
            className="bxbx-phone-icon"
            alt=""
            src="/antdesigninstagramoutlined@2x.png"
          />
          <img
            className="ant-designtwitter-outlined-icon"
            alt=""
            src="/antdesigntwitteroutlined@2x.png"
          />
        </div>
      </div>
      <img
        className="cit-logo-2-copy-1"
        alt=""
        src="/cit-logo-2-copy-1@2x.png"
      />
      </div>
      
    <div className="chat-container">
  <h1>ASK LISA</h1>
  <div className="chat-history">
    {conversation.map((chat, index) => (
      <div key={index} className={`message ${chat.role}`}>
        <strong>
          {chat.role === 'user' ? (
            <>
              <FontAwesomeIcon icon={faUser} /> You:
            </>
          ) : (
            <>
              <FontAwesomeIcon icon={faRobot} /> Chatbot:
            </>
          )}
        </strong>{' '}
        {chat.message}
      </div>
    ))}
  </div>
  <div className="user-input">
    <input
      type="text"
      value={userInput}
      onChange={(e) => setUserInput(e.target.value)}
      placeholder="Enter your Question..."
    />
 <button
          onClick={sendMessage}
          style={{
            backgroundColor: 'blue',
            color: 'white',
            border: 'none',
            padding: '10px 20px',
            borderRadius: '5px',
            cursor: 'pointer',
            fontSize: '16px',
          }}
        >
          Send
        </button>
        </div>
        </div>
        <div className="pls">
          <img className="Lisa"alt=""src="/ellipse-8@2x.png"/>
        </div>
  </div>
  );
}

export default App;
