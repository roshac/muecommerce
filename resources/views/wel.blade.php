<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css\app.css')}}">
  <link rel="stylesheet" href="{{asset('css\style.css')}}">
  <link rel="stylesheet" href="{{asset('css\style2.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous" type="application/javascript"></script>
  <script src="{{asset('js\app.js')}}"></script>
  <script src="{{asset('js\script.js')}}"></script>
  <script src="{{asset('js\jquery.countdown.js')}}" type="application/javascript"></script>
  <title>Document</title>
  
</head>

<body class="bg" style="font-size: 13px">
  
  <header class="section-header">


    <section class="header-main border-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-4">
            <a href="/" class="brand-wrap">
              <img src="{{ URL::asset('storage/logoec.png')}}" width="auto" height="" style=""/>

            </a> <!-- brand-wrap.// -->
          </div>
          <div class="col-lg-6 col-sm-12 order-3 order-lg-2">
            <form action="#" class="search-wrap">
              <div class="input-group w-100">
                <select class="custom-select" name="category_name">
                  <option value="">All type</option><option value="codex">Special</option>
                  <option value="comments">Only best</option>
                  <option value="content">Latest</option>
                </select>
                <input type="text" class="form-control" style="width:60%;" placeholder="Search">

                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </form> <!-- search-wrap .end// -->
          </div> <!-- col.// -->
          <div class="col-lg-3 col-sm-6 col-8 order-2 order-lg-3">
            <div class="d-flex justify-content-end">
              <div class="widget-header">
                <small class="title text-muted">Welcome guest!</small>
                <div>
                  <a href="/login">Sign in</a> <span class="dark-transp"> | </span>
                  <a href="/register"> Register</a>
                </div>
              </div>
              <a href="/shipping" class="widget-header pl-3 ml-3">
                <div class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></div>
                <span class="badge badge-pill badge-danger notify">{{$oldCart = Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
              </a>
            </div> <!-- widgets-wrap.// -->

          </div> <!-- col.// -->
        </div> <!-- row.// -->
      </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    <nav class="navbar navbar-main navbar-expand-lg border-bottom" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav3" aria-expanded="false" aria-label="toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav3">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link pl-0" href="/"> <strong>Home</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0" href="all">All category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clothes">Fashion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stat">Stationery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="eletronics">Electronics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="food">Food &amp; Snacks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="beauty">Beauty</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="food">Drink</a>   
                <a class="dropdown-item" href="shoes">Shoes</a>
                <a class="dropdown-item" href="#">Bags</a>            
              </div>
            </li>
            </div>
          </ul>
          <div class="widget-header">
            <div>
              <a href="/dashboard">My Account</a> <span class="dark-transp"> | </span>
              <a href="/wish_list"> Wishlist</a> <span class="dark-transp"> | </span>
              <a href="#"> Checkout</a>
            </div>
          
        </div> <!-- collapse .// -->
      </div> <!-- container .// -->
    </nav> <!-- navbar main end.// -->
  </header> <!-- section-header.// -->
  </div>
</body>
</html>
