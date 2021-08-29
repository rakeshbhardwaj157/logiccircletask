<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LogicCircleTask</title>
    <!-- Favicons -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
.prod-ser-pricing{
    margin: 0 -15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.14);
    background: #fff;
    text-align: center;
    position: relative;
    transition: all 0.4s ease 0s;
}
.prod-ser-pricing:hover{
    background: #f5f4f2;
}
.prod-ser-pricing .prod-ser-pricing-header{
    background-color: #D1E9E9;
    color: #989a8f;
    padding: 15px 0 50px 0;
    position: relative;
    transition: all 0.5s ease 0s;
}
.prod-ser-pricing:hover .prod-ser-pricing-header{
    background: #5BC0DE;
    color: #fff;
}
.prod-ser-pricing .heading{
    font-size: 20px;
    margin: 0;
    text-transform: uppercase;
}
.prod-ser-pricing .price-value{
    width: 70px;
    height: 70px;
    line-height: 70px;
    border-radius: 50%;
    background: #D96C00;
    font-size: 30px;
    color: #fff;
    position: absolute;
    top: 50px;
    left: 38%;
    transition: all 0.5s ease-in-out 0s;
}
.prod-ser-pricing:hover .price-value{
    background: #D9534F;
}
.prod-ser-pricing .pricingContent ul{
    padding: 0;
    list-style: none;
    margin-top: 50px;
}
.prod-ser-pricing .pricingContent ul li{
    color: #989a8f;
    padding: 5px 0;
}
.prod-ser-pricing .prod-ser-pricing-sign-up{
    padding: 15px 0;
}
.prod-ser-pricing .btn-buy{
    width: 50%;
    border-radius: 5px;
    width:auto;
    border: 1px solid #989a8f;
    padding: 10px 15px;
    font-size: 15px;
    font-weight: 700;
    color: #fff;
    text-transform: uppercase;
    margin: 0 auto;
    transition: all 0.5s ease 0s;
    text-decoration: none;
}
.prod-ser-pricing .btn-more{
    width: 50%;
    border-radius: 5px;
    width:auto;
    border: 1px solid #989a8f;
    padding: 10px 10px;
    font-size: 15px;
    font-weight: 700;
    color: #000;
    text-transform: uppercase;
    margin: 0 auto;
    transition: all 0.5s ease 0s;
    text-decoration: none;
}
.prod-ser-pricing:hover .btn-buy{
    background: #8A211E;
    color: #fff;
    border: 1px solid #5a5d8a;
}
.prod-ser-pricing:hover .btn-more{
    background: #1F7E9A;
    color: #fff;
    border: 1px solid #5a5d8a;
}
@media screen and (max-width:990px){
    .prod-ser-pricing{ margin-bottom: 30px; }
 
    .prod-ser-pricing .price-value{ left:40%; }
}
@media screen and (max-width:767px){
    .prod-ser-pricing{margin: 0 0 30px;}
 
    .prod-ser-pricing .price-value{ left:45%; }
}
@media screen and (max-width:480px){
    .prod-ser-pricing .price-value{ left:42%; }
}
@media screen and (max-width:360px){
    .prod-ser-pricing .price-value{ left:38%; }
}

#footer {
    background:#000;
    border-top:1px solid #00F0FF;
    clear:both;
    height:30px;
    margin-top:-30px;
    padding:5px 0;
    width:100%;
    position: fixed;
    bottom: 0px;
    left: 0px;
}
</style>

  </head>
  <body>
    <section id="container">
      @include('layout.header')
      @yield('content')
    </section>
    @include('layout.footer')
  </body>
</html>