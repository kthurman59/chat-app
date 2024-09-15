import './bootstrap';
import Alpine from 'alpinejs';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Alpine.js setup
window.Alpine = Alpine;
Alpine.start();

// Initialize Laravel Echo with Pusher
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.VITE_PUSHER_APP_KEY,
    cluster: process.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

// Chat Room ID
const roomId = 'your-room-id'; // Replace with actual room ID

// Listen for real0time messages
Echo.channel(`chat.${roomId}`)
    .listen('MessageSent', (e) => {
        const chatWindow = document.getElementById('chat-window');
        const messageElement = document.createElement('div');
        messageElement.textContent = `${e.message.sender}: ${e.message.text}`;
        chatWindow.appendChild(messageElement); //Append the new message to chat window
    });

// Handle sending messages
document.getElementById('sendmessage').addEventListener('click', function (e) {
    e.preventDefault();
    const messageInput = document.getElementById('message-input');
    const messageText = messageInput.value;

    // Send the message to the server
    axios.post('/send-message', {
        message: messageText,
        roomId: roomId
    })
    .then(function(response) {
        messageInput.value = ''; // Clear input after sending
    })
    .catch(function (error) {
        console.error('Error sending message:', error)
    });
});
