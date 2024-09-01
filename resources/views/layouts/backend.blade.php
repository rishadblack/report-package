<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* resources/css/a4-page-view.css */
        .a4-page-view {
            width: 210mm;
            /* A4 width */
            height: 297mm;
            /* A4 height */
            margin: 0 auto;
            padding: 10mm;
            /* Adjust padding as needed */
            box-sizing: border-box;
            border: 1px solid #ddd;
            /* Optional border for visualization */
            background: #fff;
            /* Background color */
            overflow: auto;
            /* Allow scrolling if content overflows */
            position: relative;
        }

        /* body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 0vh;
            margin: 0;
            background-color: #f0f0f0;
        } */
    </style>
</head>

<body>
    <div class="a4-page-views">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
