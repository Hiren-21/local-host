const responses = {
    'hello': 'Hi there! How can I help you. Send "Buddy" to continue',
    'how are you': 'I am doing well, thanks for asking!',
    'what is your name': 'My name is Chat Bot.',
    'bye': 'Goodbye! Feel free to share your experience in the Feeback form',
    'hi' : 'Hi there! How can I help you. Send "Buddy" to continue',
    'buddy' : 'Send "Hobbies" To Know About Your Buddys hobby.       Send "Rating" To Know About Your Buddys Rating.       Send "Conact" To Know About Your Buddys contact details.', 
    'hobbies' : 'Singing',
    'rating' : 'poor',
    'contact' : '8767321998'
  
  };
  
  const chatOutput = document.querySelector('.chat-output');
  const chatInput = document.querySelector('.chat-input');
  
  chatInput.addEventListener('keydown', function(event) {
    if (event.keyCode === 13) {
      const userInput = chatInput.value.toLowerCase();
      const botResponse = responses[userInput] || 'I am not sure what you mean. If you have any querry you can contact the admin email:localbuddy06@gmail.com phone:9082228112';
      chatOutput.innerHTML += `<p><strong>You:</strong> ${userInput}</p><p><strong>Bot:</strong> ${botResponse}</p>`;
      chatInput.value = '';
    }
  });