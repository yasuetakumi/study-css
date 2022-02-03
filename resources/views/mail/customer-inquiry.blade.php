<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Customer Inquiry</h3>

    <p>Property ID : {{ $inquiries['property_id'] }}</p>
    <p>Name : {{ $inquiries['name'] }}</p>
    <p>Email Customer : {{ $inquiries['email'] }}</p>
    <p>Note : {{ $inquiries['text'] }}</p>

    Thanks,<br>
    {{ config('app.name') }}
</body>
</html>
