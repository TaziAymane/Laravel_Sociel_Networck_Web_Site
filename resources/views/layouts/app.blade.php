<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Sociel Network |@yield('titel')</title>
</head>
<style>
    .publication-image {
        background-color: #f8f9fa;
        transition: transform 0.3s ease;
    }
    .card:hover .publication-image {
        transform: scale(1.03);
    }
    .card {
        transition: all 0.3s ease;
        border-radius: 10px;
    }
    .card:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>

<body>
    {{-- NAVBAR --}}
    @include('components.nav')


    {{-- ALERT --}}
   @include('components.flashbag')


    {{-- Content --}}
    <div class="container my-3">
        @yield('contente')
    </div>





    {{-- Footer --}}
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
   
</body>

</html>
