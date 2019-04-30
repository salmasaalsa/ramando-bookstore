@extends('frontEnd.layouts.master')
@section('title','Detial Page')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            @include('frontEnd.layouts.category_menu')
        </div>
        <div class="col-sm-9 padding-right">
            @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="product-details">
                <!--product-details-->

                <div class="col-sm-5">
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                        <a href="{{url('products/large',$detail_product->image)}}">
                            <img src="{{url('products/small',$detail_product->image)}}" alt="" id="dynamicImage" />
                        </a>
                    </div>

                    <ul class="thumbnails" style="margin-left: -10px;">
                        <li>
                            @foreach($imagesGalleries as $imagesGallery)
                            <a href="{{url('products/large',$imagesGallery->image)}}"
                                data-standard="{{url('products/small',$imagesGallery->image)}}">
                                <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="75"
                                    style="padding: 8px;">
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-sm-7">
                    <form action="{{route('addToCart')}}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                        <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                        <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                        <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                        <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                        <input type="hidden" name="size" value="1">

                        <div class="product-information">
                            <!--/product-information-->
                            <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <h2>{{$detail_product->p_name}}</h2>
                            <p>Code ID: {{$detail_product->p_code}}</p>

                            @if($total <= 20 ) <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @elseif($total <= 40) <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    @elseif($total <= 60 ) <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        @elseif($total <= 80) <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($total <= 100) <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                @else
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                @endif
                                <span>
                                    <span id="dynamic_price">US ${{$detail_product->price}}</span>
                                    <label>Quantity:</label>
                                    <input type="text" name="quantity" value="1" id="inputStock" />

                                    <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>

                        </div>
                        <!--/product-information-->
                    </form>
                    <p><b>Availability:</b>
                        @if($totalStock>0)
                        <span id="availableStock">In Stock</span>
                        @else
                        <span id="availableStock">Out of Stock</span>
                        @endif
                    </p>
                    <p><b>Condition:</b> New</p>

                </div>
            </div>
            <!--/product-details-->

            <div class="category-tab shop-details-tab">
                <!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                        <li><a href="#reviews" data-toggle="tab">Reviews ({{$totalReview}})</a></li>
                        <li><a href="#qa" data-toggle="tab">Q&A</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="details">
                        {{$detail_product->description}}
                    </div>


                    <div class="tab-pane fade" id="reviews">
                        <div class="col-sm-12">

                            <form action="{{url('review')}}" method="post">
                                @csrf
                                <span>
                                    <input type="text" name="name" placeholder="Your Name" />
                                    <input type="email" name="email" placeholder="Email Address" />
                                </span>
                                <textarea name="descripsi"></textarea>
                                <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="100" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="80" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="60" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="40" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="20" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                <button type="submit" class="btn btn-default pull-right">
                                    Submit
                                </button>
                            </form>
                            <div class="col-sm-12">
                                @forelse($review as $rev)

                                <ul>

                                    <p><i class="fa fa-user"></i>{{$rev->name}}</a></p>
                                    <p><i class="fa fa-calendar-o"></i>{{$rev->date}}</a></p>
                                </ul>
                                <p>Review: {{$rev->descripsi}}</p>
                                @if($rev->rating == 20)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @elseif($rev->rating == 40)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @elseif($rev->rating == 60)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @elseif($rev->rating == 80)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                @elseif($rev->rating == 100)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                @else
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @endif
                                @empty
                                <h1>Tidak ada review</h1>
                                @endforelse
                            </div>
                        </div>

                        <!--/category-tab-->
                        <div class="tab-pane fade" id="qa">



                        </div>
                    </div>


                </div>
                <!--/category-tab-->





                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $countChunk=0;?>
                            @foreach($relateProducts->chunk(3) as $chunk)
                            <?php $countChunk++; ?>
                            <div class="item<?php if($countChunk==1){ echo' active';} ?>">
                                @foreach($chunk as $item)
                                <form action="route('addToCart')" method="post">
                                    @csrf
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{url('/products/small',$item->image)}}" alt=""
                                                        style="width: 150px;" />
                                                    <input type="hidden" name="price" value="{{$item->price}}">
                                                    <h2>{{$item->price}}</h2>
                                                    <input type="hidden" name="p_name" value="{{$item->p_name}}">

                                                    <p>{{$item->p_name}}</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
    <style>
        {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .checked {
            color: orange;
        }

    </style>
    @endsection
