<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css\app.css')}}">
    <title>Mu-Ecommerce</title>
</head>
<body>
    <table>
        <tr><td><img src="{{ $message->embed('storage/email.png') }}"></td></tr>
    {{-- <tr><th><img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('storage\email.png')))}}" alt=""></th></tr> --}}
    
    <tr><td>&nbsp;</td></tr>
    <tr><td>Dear {{$name}}!</td></tr>
    <tr><td> Welcome Mu-Ecommerce, Your Package has been shipped to the Tanzania Posta please visit this Link http://41.59.86.100/Extranet/Track.aspx  and use this code {{$code}} to trace your package </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regards!</td></tr>
    <tr><td>MU-Ecommerce</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td><img src="{{ $message->embed('storage/email.png') }}"></td></tr>
    {{-- <tr><th><img src="{{ URL::asset('storage/email.png')}}" width="auto" height="auto" style=""/></th></tr> --}}
    </table>
</body>
</html>