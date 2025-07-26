export const renderInfluences =(data)=> {
  const container = document.getElementById('influenceBreakdown');
  container.innerHTML = '';

  data.forEach((item) => {
        let emoji, levelClass;

    if (item.impact >= 70) {
      emoji = '🔥';       // High impact
      levelClass = 'influence-high';
    } else if (item.impact >= 50) {
      emoji = '🌤️';       // Medium impact
      levelClass = 'influence-medium';
    } else {
      emoji = '🧊';       // Low impact
      levelClass = 'influence-low';
    }

    const bar = document.createElement('div');
    bar.className = 'influence-bar';

    bar.innerHTML = `
      <div class="influence-label">${emoji} ${item.label}</div>
      <div class="influence-progress">
        <div class="influence-fill ${levelClass}" style="width: ${item.impact}%">
          ${item.impact}%
        </div>
      </div>
    `;
    container.appendChild(bar);
  });
};
