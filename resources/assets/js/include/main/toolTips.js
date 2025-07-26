export const tooltips = () => {
  const tips = {
    whatToBuy: 'This question personalizes your advice by identifying the item you’re considering.',
    cost: 'This evaluates how the item’s cost aligns with your budget.',
    buyingFeeling: 'This explores your emotional response to making the purchase.',
    notImpulsive: 'This assesses how long you’ve been considering this purchase.',
    necessity: 'This determines whether the item is a need or a want.',
    option: 'This checks if you’ve explored other options or alternatives.',
    paymentSource: 'This identifies the funding source for your purchase.',
    affordability: 'This evaluates if the purchase fits comfortably within your financial situation.',
    concerns: 'This gauges any financial concerns, such as debt or job stability.',
    checkbox: 'This confirms your agreement to the terms to proceed.',
    submitButton: 'Please submit your responses to generate a purchase decision.'
  };
  
  Object.entries(tips).forEach(([key, value]) => {
    const tipElement = document.getElementById(`${key}_help`);
    if (tipElement) {
      tipElement.innerHTML = value;
    }
  });
  
};