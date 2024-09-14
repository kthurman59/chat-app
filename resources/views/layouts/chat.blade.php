<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Chat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div id="chat-window">
            <ul id="messages">
                <!-- Messages will be appended here -->
            </ul>
        </div>

        <input type="text" id="message-input" placeholder="Type a message" />
        <button id="send-message">Send</button>
    </div>

    <script>
        // Send message logic (integrate this later)
    </script>
</body>
</html>