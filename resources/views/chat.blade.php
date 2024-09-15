<div id="chat-window></div> <!-- Messages will show here -->

<input type="text" id="message-input" placeholder="Type your message...">
<button id="sendmessage">Send</button> <!-- Button triggers message send --> 

<script>
    document.getElementById('sendmessage').addEventListener('click', function() {
        const messageInput = document.getElementById('message-input');
        const message = messageInput.value;
        messageInput.value = ''; // Clear the input field after sending

        if (message.trim() === '') {
            alert('Please enter a message.');
            return;
        }

        // Send the message to the server using Axios
        axios.post('/send-message', {
            message: message
        }).then(response => {
            console.log('Message sent:', response);
          .catch(error => {
            console.error('Error sending message: ', error);
          });
        });

        // Initialize Laravel Echo
        import Echo from 'laravel-echo';
        window.Pusher = require('pusher-js');

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: process.env.MIX_PUSHER_APP_KEY,
            cluster: process.env.MIX_PUSHER_APP_CLUSTER,
            forceTLS: true 
        });

        // LIsten for the MessageSent event and display it in real-time
        Echo.channel('chat.1') //Example room ID, adjust as needed
            .listen('MessageSent', (e) => {
                const chatWindow = document.getElementById('chat-window');
                chatWindow.innerHTML += `<div><strong>${e.message.sender}:</strong> ${e.message.content}</div>`;  
            });
    
</script>