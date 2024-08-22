<!-- home.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }

        textarea, input[type="text"] {
            font-size: 16px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .response-container {
            margin-top: 20px;
        }

        .response-container textarea {
            height: 150px;
            font-size: 16px;
            white-space: pre-wrap; /* Preserve white space */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Coloque sua mão no campo abaixo</h1>
        <form action="{{ route('home.store') }}" method="POST">
            @csrf
            <label for="hand">Mão:</label>
            <textarea name="hand" id="hand" rows="4" placeholder="Digite a sua mão aqui..."></textarea>
            <input type="submit" value="Submit">
        </form>

        @if(isset($OpenAIChatServiceResponse))
            <div class="response-container">
                <h2>Resposta da API:</h2>
                <label for="apiResponse">Resposta:</label>
                <div id="apiResponse">{!! $OpenAIChatServiceResponse !!}</div>
            </div>
        @endif
    </div>
</body>
</html>
