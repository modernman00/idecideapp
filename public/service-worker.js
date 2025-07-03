const STATIC_CACHE = 'idecide-static-v1';
const MEDIA_CACHE = 'idecide-media-v1';
const RUNTIME_IMAGE_CACHE = 'idecide-runtime-images';
const OFFLINE_PAGE = '/offline.html';

const STATIC_ASSETS = [
  '/',
  '/index.php',
  '/css/main.css',
  '/js/main.js',
  OFFLINE_PAGE, // fallback page
  '/images/icon-192x192.png',
  '/images/icon-512x512.png'
];

const MEDIA_ASSETS = [
  '/images/about-image.jpg',
  '/images/AFFORDABILITY.jpg',
  '/images/BRAIN.jpg',
  '/images/BUY_DECISION.jpg',
  '/images/BUY_LESS_CHOOSE_WISE.jpg',
  '/images/CARS.jpg',
  '/images/CREDIT.jpg',
  '/images/DEBT_LEVEL.jpg',
  '/images/disapproval.jpg',
  '/images/FEELINGS.jpg',
  '/images/HAPPY_SMILES.jpg',
  '/images/landingpage.png',
  '/images/MONEY.jpg',
  '/images/MONEY2.jpg',
  '/images/more-info.jpg',
  '/images/OPTIONS.jpg',
  '/images/OPTIONS2.jpg',
  '/images/PAYING.jpg',
  '/images/person-is-standing-top-balance-scale-representing-concept-balance-equality-symbolic-representation-balance-equality-minimalist-simple-modern-vector-logo-design_538213-48800.avif',
  '/images/rejection.png',
  '/images/sadFace_smiley.png',
  '/images/SAFE.jpg',
  '/images/SHOPPING_BASKET.jpg',
  '/images/SHOPPING_MALL.jpg',
  '/images/smiley_approval.png',
  '/images/smiley_happy.png',
  '/images/smiley_neutral.png',
  '/images/smiley_rejection.png',
  '/images/smiley_sadface.png'
];

// 🔧 INSTALL: pre-cache static shell + media
self.addEventListener('install', event => {
    console.log("Service Worker installed");
  event.waitUntil(
    Promise.all([
      caches.open(STATIC_CACHE).then(cache => cache.addAll(STATIC_ASSETS)),
      caches.open(MEDIA_CACHE).then(cache => cache.addAll(MEDIA_ASSETS))
    ])
  );
  self.skipWaiting();
});

// 🧹 ACTIVATE: clean up old caches
self.addEventListener('activate', event => {
  const keepCaches = [STATIC_CACHE, MEDIA_CACHE, RUNTIME_IMAGE_CACHE];
  event.waitUntil(
    caches.keys().then(keys =>
      Promise.all(keys.map(key => {
        if (!keepCaches.includes(key)) {
          return caches.delete(key);
        }
      }))
    )
  );
  self.clients.claim();
});

// 📡 FETCH: handle caching logic
self.addEventListener('fetch', event => {
  if (event.request.method !== 'GET') return;

  const { destination, mode } = event.request;

  // Stale-while-revalidate for page navigations
  if (mode === 'navigate') {
    event.respondWith(
      caches.match(event.request).then(cached => {
        const fetchPromise = fetch(event.request).then(networkResponse => {
          const copy = networkResponse.clone();
          caches.open(STATIC_CACHE).then(cache => cache.put(event.request, copy));
          return networkResponse;
        }).catch(() => caches.match(OFFLINE_PAGE));
        return cached || fetchPromise;
      })
    );
    return;
  }

  // Image runtime caching
  if (destination === 'image') {
    event.respondWith(
      caches.open(RUNTIME_IMAGE_CACHE).then(cache =>
        cache.match(event.request).then(response =>
          response ||
          fetch(event.request).then(networkResponse => {
            cache.put(event.request, networkResponse.clone());
            return networkResponse;
          }).catch(() => caches.match('/images/icon-192x192.png')) // fallback image
        )
      )
    );
    return;
  }

  // Everything else: static cache fallback
  event.respondWith(
    caches.match(event.request).then(response =>
      response || fetch(event.request)
    )
  );
});

// 🔁 SYNC: retry offline requests. Add this inside your service worker to trigger the module’s retry logic:
self.addEventListener('sync', (event) => {
  if (event.tag === 'sync-idecide-data') {
    event.waitUntil(self.sendQueuedRequests?.() || Promise.resolve());
  }
});


// ✉️ PUSH: show notifications
self.addEventListener('push', event => {
  const data = event.data ? event.data.json() : {};
  event.waitUntil(
    self.registration.showNotification(data.title || 'iDecide', {
      body: data.body || 'You have a new notification!',
      icon: '/images/pwa/ios/192.png'
    })
  );
});

// 📮 Helper: retry function (you can expand this logic)
async function sendQueuedRequests() {
  const queue = await getLocalQueue(); // Your custom queue logic here
  for (const requestData of queue) {
    try {
      await fetch(requestData.url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(requestData.body)
      });
      // If successful, remove from queue
      await removeFromQueue(requestData.id);
    } catch (err) {
      // Fail silently or log
    }
  }
}
