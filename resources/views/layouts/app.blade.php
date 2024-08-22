<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Inclua aqui estilos personalizados, se necessário */
        .card {
            width: 60px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            user-select: none;
            margin: 5px;
        }

        .hearts { background-color: #ff6666; }
        .diamonds { background-color: #99ccff; }
        .clubs { background-color: #99ff99; }
        .spades { background-color: #cccccc; }

        .card.selected {
            border: 2px solid #000;
        }

        .card-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .response-container div {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            white-space: pre-wrap; /* Preserve white space */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
