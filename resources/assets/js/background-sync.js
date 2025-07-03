// background-sync.js

// 🔐 Module-wide constants
const DB_NAME = 'idecide-sync'; // The name of your local mini-database
const STORE_NAME = 'queued-posts'; // A place to store POST requests
const SYNC_TAG = 'sync-idecide-data';


// 🧰 Open or upgrade the local IndexedDB queue
function openDB() {
  return new Promise((resolve, reject) => {
    const request = indexedDB.open(DB_NAME, 1);
    // This only runs the first time (or if you bump version)
    request.onupgradeneeded = () => {
      // Create an object store to save queued data with auto-incremented IDs
      request.result.createObjectStore(STORE_NAME, { keyPath: 'id', autoIncrement: true });
    };

    request.onsuccess = () => resolve(request.result); // DB opened successfully
    request.onerror = () => reject(request.error);     // Something went wrong
  });
}

// 💾 Add a POST request to the queue
export async function queuePostRequest(url, body) {
  const db = await openDB();
  const tx = db.transaction(STORE_NAME, 'readwrite');
  tx.objectStore(STORE_NAME).add({ url, body });
  await tx.complete;

  // 📡 Ask the Service Worker to sync when online
  const reg = await navigator.serviceWorker.ready;
  if ('sync' in reg) {
    await reg.sync.register(SYNC_TAG);
  } else {
    // fallback sync attempt
    await sendQueuedRequests();
  }
}

// 📤 Send all queued requests
export async function sendQueuedRequests(showToast = true) {
  const db = await openDB();
  const tx = db.transaction(STORE_NAME, 'readwrite');
  const store = tx.objectStore(STORE_NAME);
  const requests = await store.getAll();

  for (const entry of requests) {
    try {
      const res = await fetch(entry.url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(entry.body)
      });

      if (res.ok) {
        store.delete(entry.id); // 👋 Clean up if it worked
        if (showToast) showSyncToast('✅ Sent saved data to server');
      } else {
        throw new Error('Bad response');
      }
    } catch (err) {
      // Still offline? Quietly keep in queue
    }
  }

  await tx.complete;
}

// 🔔 Lightweight toast for visual feedbackNow every time a saved request syncs in the background, your user gets:

// A melodic chime 🔔

// A stylish toast bubble 💬

// Whimsical emoji confetti 🎈✨🧠
function showSyncToast(message) {
  // Create and play success chime
  const audio = new Audio('/sounds/success-chime.mp3');
  audio.volume = 0.4;
  audio.play().catch(() => {}); // Prevent errors if user hasn’t interacted yet

  // Create the visual toast
  const toast = document.createElement('div');
  toast.innerHTML = `<span>💬</span> ${message}`;
  toast.style = `
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    background: linear-gradient(135deg, #00695c, #26a69a);
    color: #fff;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    font-size: 0.95rem;
    font-family: system-ui, sans-serif;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 10000;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.4s ease, transform 0.4s ease;
  `;
  document.body.appendChild(toast);

  // Animate in
  requestAnimationFrame(() => {
    toast.style.opacity = '1';
    toast.style.transform = 'translateY(0)';
  });

  // Fade out after delay
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(20px)';
    setTimeout(() => toast.remove(), 400);
  }, 4000);

  // 🌟 Add floating confetti emojis!
  for (let i = 0; i < 10; i++) {
    const emoji = document.createElement('div');
    emoji.textContent = ['🎈', '✨', '🪄', '🎉', '🧠'][Math.floor(Math.random() * 5)];
    emoji.style = `
      position: fixed;
      left: ${Math.random() * 100}vw;
      bottom: 0;
      font-size: 1.5rem;
      animation: float-up 2.5s ease-out forwards;
      z-index: 9999;
    `;
    document.body.appendChild(emoji);
    setTimeout(() => emoji.remove(), 3000);
  }

  // Floating animation
  const style = document.createElement('style');
  style.textContent = `
    @keyframes float-up {
      0% { transform: translateY(0); opacity: 1; }
      100% { transform: translateY(-150px); opacity: 0; }
    }
  `;
  document.head.appendChild(style);
}


