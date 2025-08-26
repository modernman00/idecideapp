import { qSelAll } from '../../global';

export const intersection = () => {

  

  // Set up an IntersectionObserver to animate cards when they enter the viewport
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) { // When the card is visible
        entry.target.classList.remove('hidden');
      entry.target.classList.add('visible'); // Add 'visible' class for animation
      observer.unobserve(entry.target); // Stop observing once animated
    }
  });
});

// Apply the observer to all hidden cards
qSelAll('.card').forEach((card) => {
  observer.observe(card); // Watch each card for visibility
});


};