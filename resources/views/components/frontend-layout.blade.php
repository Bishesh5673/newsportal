<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Portal</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67e6b68659793500196ab073&product=inline-share-buttons&source=platform" async="async"></script>
</head>
<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v22.0"></script>

    <x-frontend-header/>

    <main>
        {{$slot}}
    </main>

    <footer></footer>
</body>
</html>
