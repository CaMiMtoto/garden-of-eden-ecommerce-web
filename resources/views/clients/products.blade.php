@extends('layouts.app')

@section('title')
    Home| products
@endsection
@section('content')
    <br>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>Categories</h4>
                    <div>
                        <?php
                        $cat = 0;
                        if (isset($_GET['cat']))
                        {
                            $cat = $_GET['cat'];
                        }
                        ?>
                        <ul class="list-group rounded-sm shadow-sm">
                            @foreach(\App\Category::all() as $category)
                                <li class="list-group-item {{ $category->id===(int)$cat? 'active1':'' }}">
                                    <a href="/getProduct?cat={{ $category->id }}">
                                        {{ $category->name }}
                                        <span class="badge badge-primary pull-right">{{$category->products()->count()}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <section class="col-md-9">
                    <div>
                        <h4>
                            Showing result of {{ $products->total() }} product(s)
                            <small> currently showing {{ $products->count() }} product(s)</small>
                        </h4>
                        <ul class="list-group">
                            @forelse($products as $product)
                                <li class="item list-group-item rounded-sm shadow-xs">
                                   <livewire:product-item :product="$product" />
                                </li>
                            @empty
                                <li>
                                    <div class="alert alert-info rounded-sm shadow-sm">
                                        <p>
                                            Your search keyword could not math anything. Try with a different
                                            keyword.
                                        </p>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                        {{ $products->links() }}
                    </div>
                    <div class="clearfix"></div>
                </section>
            </div>
        </div>
    </div>

    <style>
        html, body {
            background-color: #FCFCFC;
        }

        .container-div {
            max-height: 200px;
            overflow-y: hidden
        }

        .ratings {
            color: grey;
        }

        .grow {
            transition: all .2s ease-in-out;
        }

        .product-name {
            color: #449D44;
        }

        .grow:hover {
            transform: scale(1.1);
        }

        .item.list-group-item {
            width: 100%;
            background-color: #fff;
            margin-bottom: 10px;
        }


    </style>

@endsection
