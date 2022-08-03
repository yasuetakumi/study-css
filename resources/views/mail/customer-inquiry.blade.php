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

    <p>物件ID : {{ $inquiries['property_id'] }}</p>
    <p>お問い合わせ種別 : {{$inquiries['contact_us_type_label']}}</p>
    <p>ご担当者名 : {{ $inquiries['name'] }}</p>
    <p>メールアドレス : {{ $inquiries['email'] }}</p>
    <p>電話番号 : {{ $inquiries['phone'] ? $inquiries['phone'] : '-' }}</p>
    <p>お問い合わせ内容 : {{ $inquiries['text'] }}</p>

    Thanks,<br>
    {{ config('app.name') }}
</body>
</html>
