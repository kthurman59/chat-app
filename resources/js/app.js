import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.getElementById('send-message').addEventListener('click', function () {
    let message = document.getElementById('message-input').value;

    axios.post('/send-message', { message: message })
        .then(response => {
            console.log('Message sent:', response.data);
        })
        .catch(error => {
            console.error('Error sending message:', error);
        });
});

// Listen for the MessageSent event and append the message to the chat window
Echo.channel('chat')
    .listen('MessageSent', (e) => {
        let messageElement = document.createElement('li');
        messageElement.innerText = e.message;
        document.getElementById('messages').appendChild(messageElement);
    });
