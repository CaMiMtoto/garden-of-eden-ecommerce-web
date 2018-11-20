
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="">
                    <a href="{{ route('home') }}">
                        <i class="ti-home"></i>
                        Home
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('getProduct') }}">
                        <i class="ti-gallery"></i>
                        Products
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="ti-align-center"></i>
                        Categories
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach(\App\Category::all() as $category)
                            <li>
                                <a href="/getProduct?cat={{ $category->id }}">
                                    {{ $category->name }}
                                    <span class="label label-danger pull-right">{{$category->products()->count()}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
