<link rel="shortcut icon" href="{{ asset('resources/favicon/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="70x70" href="{{ asset('resources/favicon/mstile-70x70.png') }}">
<link rel="apple-touch-icon" sizes="150x150" href="{{ asset('resources/favicon/mstile-150x150.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('resources/favicon/apple-touch-icon.png') }}">
<link rel="apple-touch-icon" sizes="310x310" href="{{ asset('resources/favicon/mstile-310x310.png') }}">
<link rel="apple-touch-icon" sizes="310x150" href="{{ asset('resources/favicon/mstile-310x150.png') }}">
<link rel="icon" type="image/png" href="{{ asset('resources/favicon/favicon-16x16.png') }}" sizes="16x16">
<link rel="icon" type="image/png" href="{{ asset('resources/favicon/favicon-32x32.png') }}" sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('resources/favicon/android-chrome-512x512.png') }}" sizes="512x512">
<link rel="icon" type="image/png" href="{{ asset('resources/favicon/android-chrome-192x192.png') }}" sizes="192x192">
<meta name="msapplication-square70x70logo" content="{{ asset('resources/favicon/mstile-70x70.png') }}" />
<meta name="msapplication-square150x150logo" content="{{ asset('resources/favicon/mstile-150x150.png') }}" />
<meta name="msapplication-wide310x150logo" content="{{ asset('resources/favicon/mstile-310x150.png') }}" />
<meta name="msapplication-square310x310logo" content="{{ asset('resources/favicon/mstile-310x310.png') }}" />
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="date=no">
<meta name="format-detection" content="address=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="url=no">

<link rel="stylesheet" href="{{ asset('resources/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/category-carousel-section.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/contacts-section.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/jquery.formstyler.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/locks-n-furniture-section.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/welcome-section.css') }}">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
<script src="https://www.google.com/recaptcha/api.js?render=6LciJrMaAAAAAH5_NJUJ4i1bSXx7Fc_Iw8GLaWUJ"></script>

<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('6LciJrMaAAAAAH5_NJUJ4i1bSXx7Fc_Iw8GLaWUJ', { action: 'contact' }).then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
        grecaptcha.execute('6LciJrMaAAAAAH5_NJUJ4i1bSXx7Fc_Iw8GLaWUJ', { action: 'contact' }).then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaKomm');
            recaptchaResponse.value = token;
        });
    });
</script>

<style>
    .order-modal__button{
        margin-bottom: 2rem;
    }
    .grecaptcha-badge {display: none;}
</style>