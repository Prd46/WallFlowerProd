// Get all footer buttons
const footerButtons = document.querySelectorAll('.footer_button');

// Function to handle touch start event
function handleTouchStart(event) {
  // Add a class to the button when touched
  event.currentTarget.classList.add('active');
}

// Function to handle touch end event
function handleTouchEnd(event) {
  // Remove the class when touch ends
  event.currentTarget.classList.remove('active');
}

// Add event listeners for touch events to all footer buttons
footerButtons.forEach(button => {
  button.addEventListener('touchstart', handleTouchStart);
  button.addEventListener('touchend', handleTouchEnd);
});