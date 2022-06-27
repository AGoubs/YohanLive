var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
  // '/events/create-contact/43',
  // '/events/contact/43',
  '/assets/css/soft-ui-dashboard.min.css',
  '/assets/css/open-sans.min.css',
  '/assets/js/kit-fontawesome.min.js',
  '/assets/js/alpine.min.js',
  '/assets/js/core/bootstrap.min.js',
  '/assets/js/core/jquery-3.6.0.min.js',
  '/assets/js/soft-ui-dashboard.js?v=1.0.2',
  '/images/icons/72.png',
  '/images/icons/128.png',
  '/images/icons/512.png',
];

// Cache on install
self.addEventListener("install", event => {
  this.skipWaiting();
  event.waitUntil(
    caches.open(staticCacheName)
      .then(cache => {
        return cache.addAll(filesToCache);
      })
  )
});

// Clear cache on activate
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames
          .filter(cacheName => (cacheName.startsWith("pwa-")))
          .filter(cacheName => (cacheName !== staticCacheName))
          .map(cacheName => caches.delete(cacheName))
      );
    })
  );
});

// Serve from Cache
self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
      .catch(() => {
        return caches.match('offline');
      })
  )
});