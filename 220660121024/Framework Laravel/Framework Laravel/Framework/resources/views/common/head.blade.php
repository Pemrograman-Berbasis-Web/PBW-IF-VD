<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="list-hash" content="{{ $checklist->hash ?? '' }}">
    <title>{{ isset($checklist) ? 'A list from ' . $checklist->created_at->format('M d') : 'Welcome' }} &larr; ListPal</title>
    <meta name="description" content="Create easily shareable to-do lists that automatically stay in sync and display updates in real time.">
    <link rel="stylesheet" type="text/css" href="{{ mix('/assets/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Assistant:700|Roboto:400,500,700&display=swap" rel="stylesheet">
    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="{{ isset($checklist) ? $checklist->created_at->format('M d') . ' -' : '' }} ListPal">
    <meta name="mobile-web-app-capable" content="yes">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ isset($checklist) ? 'A list from ' . $checklist->created_at->format('M d') : 'Welcome' }} &larr; ListPal">
    <meta property="og:description" content="Create easily shareable to-do lists that automatically stay in sync and display updates in real time.">
    <meta property="og:image" content="https://listpal.co/assets/images/icons/android-icon-192x192.png">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ isset($checklist) ? 'A list from ' . $checklist->created_at->format('M d') : 'Welcome' }} &larr; ListPal">
    <meta name="twitter:description" content="Create easily shareable to-do lists that automatically stay in sync and display updates in real time.">
    <meta name="twitter:image" content="https://listpal.co/assets/images/icons/android-icon-192x192.png">

    <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="/assets/images/icons/ms-icon-144x144.png">
    <link rel="icon" href="/assets/images/logo.png" type="image/png">

    <link rel="manifest" href="/manifest.json">
    
    <meta name="msapplication-TileColor" content="#424242">
    <meta name="theme-color" content="#424242">

    @if(env('GA_UA_CODE'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142997130-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ env('GA_UA_CODE') }}');
        </script>
    @endif
</head>