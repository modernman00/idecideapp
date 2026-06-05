const CACHE_NAME = 'idecide-v3';
const STATIC_ASSETS = [
  '/',
  '/public/offline.html',
  '/public/css/main.css',
  '/public/js/index.js',
  '/public/images/logo/vector/default.svg',
  '/public/images/MONEY.jpg'
];

// Install Event
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => {
      console.log('[SW] Pre-caching static assets');
      return cache.addAll(STATIC_ASSETS);
    })
  );
  self.skipWaiting();
});

// Activate Event
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(keys => {
      return Promise.all(
        keys.filter(key => key !== CACHE_NAME).map(key => caches.delete(key))
      );
    })
  );
  self.clients.claim();
});

// Fetch Event
self.addEventListener('fetch', event => {
  if (event.request.method !== 'GET') return;

  event.respondWith(
    caches.match(event.request).then(cachedResponse => {
      if (cachedResponse) {
        return cachedResponse;
      }

      return fetch(event.request).then(networkResponse => {
        // Cache images and CSS/JS dynamically
        if (
          networkResponse.ok &&
          (event.request.destination === 'image' || 
           event.request.destination === 'style' || 
           event.request.destination === 'script')
        ) {
          const responseClone = networkResponse.clone();
          caches.open(CACHE_NAME).then(cache => {
            cache.put(event.request, responseClone);
          });
        }
        return networkResponse;
      }).catch(() => {
        // Fallback for navigation requests
        if (event.request.mode === 'navigate') {
          return caches.match('/public/offline.html');
        }
      });
    })
  );
});

// Push Notifications
self.addEventListener('push', event => {
  const data = event.data ? event.data.json() : { title: 'iDecide', body: 'New update available!' };
  const options = {
    body: data.body,
    icon: '/public/images/logo/ios/192.png',
    badge: '/public/images/logo/vector/default.svg',
    vibrate: [100, 50, 100],
    data: { url: data.url || '/' }
  };
  event.waitUntil(self.registration.showNotification(data.title, options));
});

// Notification Click
self.addEventListener('notificationclick', event => {
  event.notification.close();
  event.waitUntil(clients.openWindow(event.notification.data.url));
});
