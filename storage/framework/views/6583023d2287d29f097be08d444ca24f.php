<!-- chat bot -->
<div id="chat-toggle" onclick="toggleChat()">💬 <br> 🤖</div>
<div class="chat-container hidden" id="chat-container">
    <div class="chat-header">
        🤖 شات بوت الأسئلة الشائعة
        <span onclick="toggleChat()" style="cursor:pointer; float:left;">✖</span>
    </div>
    <div class="chat-box" id="chat-box"></div>
    <div class="chat-input">
        <input type="text" id="user-input" placeholder="اكتب سؤالك هنا..." />
        <button onclick="sendMessage()">إرسال</button>
    </div>
<?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/layout/chatbot.blade.php ENDPATH**/ ?>