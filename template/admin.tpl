<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 50px;
        }

        h1 {
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Images</h1>
    {foreach $images as $image}
        <img src="{$image.url}" alt="Image {$image.id}">
    {/foreach}

    <h1>Logs</h1>
    {foreach $logs as $log}
        <p>{$log.message}</p>
    {/foreach}
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
