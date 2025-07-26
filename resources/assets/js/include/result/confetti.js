export const triggerConfetti = () => {
  try {
    import('canvas-confetti').then((module) => {
      const confetti = module.default || module; // Handle both ES module and CommonJS
      confetti({
        particleCount: 100, // Number of confetti particles
        spread: 120, // Spread angle in degrees
        origin: { y: 0.1 }, // Start near top of screen
        ticks: 300 // Longer duration
      });
    }).catch((error) => {
      console.error('Failed to load canvas-confetti:', error);
    });
  } catch (error) {
    console.error('Error triggering confetti:', error);
  }
};
  