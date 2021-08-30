@extends('layout.master')
@section('title','View part')
@section('content')
    <section id="main-content">
      <section class="wrapper site-min-height">
        
        <div class="container">
			<div class="row">
			@if(count($products) > 0)
				@foreach($products as $product)
				<div class="col-md-3 col-sm-6">
					<div class="prod-ser-pricing">
						<div class="prod-ser-pricing-header">
							<h3 class="heading">{{ $product->title }}</h3>
							<div class="price-value">
								<i class="fa fa-usd"></i>{{ $product->price }}
							</div>
						</div>
						<div class="pricingContent">
									<ul>
										<li><b> Details</b></li>
										<li>{!!  substr(strip_tags($product->details), 0, 70) !!}</li>
										
									</ul>
						</div>
						<div class="prod-ser-pricing-sign-up">
								<a href="/signup/{{ $product->id }}" class="btn-buy btn-danger">Buy</a>
								<a href="/product/{{ $product->slug }}" class="btn-more btn-primary">More</a>
								
						</div>
					</div>
					
				</div>
				@endforeach
			@endif
        
           
            


        
        
    </div>
</div>
      </section>
    </section>
    @endsection