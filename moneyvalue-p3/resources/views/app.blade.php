<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    {{-- Vue Router --}}

    <script src="https://unpkg.com/vue@2/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router@3/dist/vue-router.js"></script>

    <style>

        /* Reset */
        html{
            font-size: 62.5%;
        }

        body{
            font: 1.6rem sans-serif;
            font-family: 'Barlow', sans-serif;
        }

        input{
            border-radius: 1rem;
        }

        fieldset{
            border: none;
        }

        .navbar{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1{
            font-size: 5.5rem !important;
        }

        h2{
            font-size: 4.5rem !important;
        }

        h3{
            font-size: 3.5rem !important;
        }

        h4{
            font-size: 2.5rem !important;
        }

        p{
            font-size: 2rem !important;

        }

        li{
            font-size: 2.5rem;
            list-style-type: none;
        }

        h1, h2, ul, body, p, figure, ol, blockquote, button{
            margin: 0;
            padding: 0;
        }

        .m-15{
            margin: 1.5rem;
        }

        .w-50 {
            width: 50%;
        }

        .mb-20 {
            margin-bottom: 2.0rem;
        }

        .mt-20{
            margin-top: 2.0rem;
        }

        .p-15 {
            padding: 1.0rem;
        }

        .center{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input{
            padding: 1rem;
            margin: .8rem;
            border-radius: .4rem;
        }
        header button{
            padding: .8rem;
            border-radius: 1rem;
        }

    </style>

    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div id="app">
        <router-view/>

    </div>



</body>
</html>
