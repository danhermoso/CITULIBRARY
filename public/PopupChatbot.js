import React, { useState } from 'react';
import 'public/PopupChatbot.css'; // Make sure this path is correct


const PopupChatbot = () => {
  const [userInput, setUserInput] = useState('');
  const [messages, setMessages] = useState([]);

  const sendMessage = () => {
    if (userInput.trim() !== '') {
      const newMessage = { role: 'user', message: userInput };
      setMessages([...messages, newMessage]);
      setUserInput('');
    }
  };

  return (
    <div className="chat-container">
      <h1>ASK LISA</h1>
      <div className="chat-history">
        {messages.map((chat, index) => (
          <div key={index} className={`message ${chat.role}`}>
            <strong>{chat.role === 'user' ? 'You:' : 'Chatbot:'}</strong> {chat.message}
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
        <button onClick={sendMessage}>Send</button>
      </div>
    </div>
  );
};

export default PopupChatbot;