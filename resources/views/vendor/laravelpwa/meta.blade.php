<!-- Web Application Manifest -->
<link rel="manifest" href="{{ route('laravelpwa.manifest') }}">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="{{ $config['theme_color'] }}">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="{{ $config['display'] == 'standalone' ? 'yes' : 'no' }}">
<meta name="application-name" content="{{ $config['short_name'] }}">
<link rel="icon" sizes="{{ data_get(end($config['icons']), 'sizes') }}" href="{{ data_get(end($config['icons']), 'src') }}">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="{{ $config['display'] == 'standalone' ? 'yes' : 'no' }}">
<meta name="apple-mobile-web-app-status-bar-style" content="{{  $config['status_bar'] }}">
<meta name="apple-mobile-web-app-title" content="{{ $config['short_name'] }}">
<link rel="apple-touch-icon" href="{{ data_get(end($config['icons']), 'src') }}">


<link href="{{ $config['splash']['240x320'] }}" media="(device-width: 120px) and (device-height: 160px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['320x480'] }}" media="(device-width: 160px) and (device-height: 240px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['480x800'] }}" media="(device-width: 240px) and (device-height: 400px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['720x1280'] }}" media="(device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['960x1600'] }}" media="(device-width: 480px) and (device-height: 800px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['1280x1920'] }}" media="(device-width: 640px) and (device-height: 860px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="{{ $config['background_color'] }}">
<meta name="msapplication-TileImage" content="{{ data_get(end($config['icons']), 'src') }}">

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>