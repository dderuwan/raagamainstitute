<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
</head>
<body>
    <div id="chat">
        <div id="messages"></div>
        <input type="text" id="message" placeholder="Type your message here...">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
        let conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            let messages = document.getElementById('messages');
            let message = document.createElement('div');
            message.textContent = e.data;
            messages.appendChild(message);
        };

        function sendMessage() {
            let input = document.getElementById('message');
            conn.send(input.value);
            input.value = '';
        }
    </script>
</body>
</html>
