@extends('master')
@section('content')
<div class="custom-prduct">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-10">
            <div class="orderNow">
                <a href="ordernow"  class="btn btn-success">Order Now</a>
            </div>
            <div class="tranding-wrapper">
            <h3>List of Products You Have Added To Cart </h3>
            @foreach($products as $item)
            <div class="row cart-item">
                <div class="col-sm-3">                        
                    <a href="detail/{{$item->id}}">
                        <img class="tranding-img" src="{{$item->gallery}}" alt="Product">
                    </a>    
                </div>
                <div class="col-sm-4">                        
                    <div class="">
                        <h2>{{$item->name}}</h2>
                        <h5>{{$item->description}}</h5>
                    </div>
                </div>
                <div class="col-sm-4 btnCartList">                        
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-info">Remove From Cart</a>
                </div>
            </div>
            @endforeach
            </div>
            <div class="orderNow">
                <a href ="ordernow"  class="btn btn-success">Order Now</a>
            </div>
        </div>
</div>
@endsection