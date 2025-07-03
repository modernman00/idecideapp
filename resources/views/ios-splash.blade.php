@php
    $splashScreens = [
        ['w' => 320,  'h' => 568,  'name' => 'iphone-se.png'],
        ['w' => 375,  'h' => 667,  'name' => 'iphone-8.png'],
        ['w' => 414,  'h' => 736,  'name' => 'iphone-8plus.png'],
        ['w' => 375,  'h' => 812,  'name' => 'iphone-x.png'],
        ['w' => 414,  'h' => 896,  'name' => 'iphone-xr.png', 'ratio' => 2],
        ['w' => 414,  'h' => 896,  'name' => 'iphone-xsmax.png', 'ratio' => 3],
        ['w' => 360,  'h' => 780,  'name' => 'iphone-12mini.png'],
        ['w' => 390,  'h' => 844,  'name' => 'iphone-13.png'],
        ['w' => 428,  'h' => 926,  'name' => 'iphone-14pro-max.png'],
        ['w' => 768,  'h' => 1024, 'name' => 'ipad.png'],
        ['w' => 834,  'h' => 1112, 'name' => 'ipad-10-5.png'],
        ['w' => 834,  'h' => 1194, 'name' => 'ipad-11.png'],
        ['w' => 1024, 'h' => 1366, 'name' => 'ipad-12-9.png'],
    ];
@endphp

@foreach ($splashScreens as $splash)
    <link rel="apple-touch-startup-image"
          media="(device-width: {{ $splash['w'] }}px) and (device-height: {{ $splash['h'] }}px){{ isset($splash['ratio']) ? ' and (-webkit-device-pixel-ratio: '.$splash['ratio'].')' : '' }}"
          href="/splash/{{ $splash['name'] }}">
@endforeach
