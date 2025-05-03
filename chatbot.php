<!DOCTYPE html>
<html>
<head>
  <style>
    #chat-button {
      position: fixed;
      bottom: 20px;
      left: 20px;
      z-index: 1000;
    }

    #chat-popup {
      position: fixed;
      bottom: 70px;
      left: 20px;
      width: 300px;
      background: white;
      border: 1px solid #ccc;
      border-radius: 12px;
      display: none;
      flex-direction: column;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      z-index: 1001;
      overflow: hidden;
    }

    #chat-header {
      padding: 10px;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #chat-body {
      display: flex;
      flex-direction: column;
      height: 300px;
    }

    #chat-messages {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
      font-size: 14px;
    }

    .message {
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 10px;
      max-width: 90%;
      word-wrap: break-word;
    }

    .message.user {
      background-color: #e2f0d9; /* light green for user */
      color: #155724;
      align-self: flex-end;
      margin-left: auto;
    }

    .message.bot {
      background-color: #d1ecf1; /* light blue for bot */
      color: #0c5460;
      align-self: flex-start;
      margin-right: auto;
    }

    #chat-input {
      border: none;
      border-top: 1px solid #ddd;
      padding: 10px;
      font-size: 14px;
      width: 100%;
      box-sizing: border-box;
      outline: none;
    }
  </style>
</head>
<body>

  <!-- Chat Button -->
  <div id="chat-button">
    <button class="btn btn-primary rounded-pill px-4" onclick="toggleChat()">💬 Chat</button>
  </div>

  <!-- Chat Popup -->
  <div id="chat-popup" class="shadow">
    <div id="chat-header" class="bg-primary text-white">
      Barangay Process FAQs
      <span onclick="toggleChat()" style="cursor: pointer;">✖</span>
    </div>
    <div id="chat-body">
      <div id="chat-messages">
      </div>
      <input type="text" id="chat-input" placeholder="Type a message..." onkeydown="sendMessage(event)">
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", fetchQuestions);

    function toggleChat() {
      const popup = document.getElementById("chat-popup");
      popup.style.display = popup.style.display === "flex" ? "none" : "flex";
    }

    function sendMessage(event) {
      if (event.key === "Enter") {
        const input = document.getElementById("chat-input");
        const msg = input.value.trim();
        if (msg === "") return;

        displayUserMessage(msg);

        input.value = "";

        setTimeout(() => {
          const botMsg = document.createElement("div");
          botMsg.className = "message bot";
          botMsg.textContent = "Thanks for your message!";
          document.getElementById("chat-messages").appendChild(botMsg);
          scrollToBottom();
        }, 1000);
      }
    }

    function displayUserMessage(text) {
      const chatBox = document.getElementById("chat-messages");
      const userMsg = document.createElement("div");
      userMsg.className = "message user";
      userMsg.textContent = text;
      chatBox.appendChild(userMsg);
      scrollToBottom();
    }

    function displayBotResponse(text) {
      const chatBox = document.getElementById("chat-messages");
      const botMsg = document.createElement("div");
      botMsg.className = "message bot";
      botMsg.textContent = text;
      chatBox.appendChild(botMsg);
      scrollToBottom();
    }

    function scrollToBottom() {
      const chatBox = document.getElementById("chat-messages");
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    function fetchQuestions() {
      fetch('main/template/mysql/fetch_chatbot_questions.php')
        .then(res => res.json())
        .then(data => {
          const chatBox = document.getElementById("chat-messages");
          const questionContainer = document.createElement("div");
          data.forEach(item => {
            const btn = document.createElement("button");
            btn.className = "btn btn-primary btn-sm mb-2";
            btn.style.textAlign = "left";
            btn.style.width = "100%";
            btn.textContent = item.questions;
            btn.onclick = () => {
              displayUserMessage(item.questions);
              setTimeout(() => {
                displayBotResponse(item.response);
              }, 500);
            };
            questionContainer.appendChild(btn);
          });
          chatBox.appendChild(questionContainer);
          scrollToBottom();
        })
        .catch(err => console.error("Failed to fetch chatbot questions:", err));
    }
  </script>
</body>
</html>
