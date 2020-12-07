<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <span>tt</span>
    <div class="options">
        <h3>options:</h3>
        <table class="table table-bordered table-striped">
        <tbody>
        <h2>{{$total}}</h2>
        <h2>{{$totalPrice}}</h2>
        @foreach ($product as $products)
            {{$products['price']}}
            <li>
               <h1> {{$products['item']['name']}}</h1>
               <h1> {{$products['item']['photo']}}</h1>

            </li>
            
            
        @endforeach
        @foreach ($product as $products)
            <span>{{$products['qty']}}</span>
                
            @endforeach	
            <h2></h2>
        </tbody>
        </table>
        </div>
        

</body>
</html>