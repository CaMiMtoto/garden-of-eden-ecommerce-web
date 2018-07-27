

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
        </div>
        <!-- logo -->
        <div class="navbar-brand">
            <a href="{{ route('dashboard') }}">
                <img class="hidden-xs" src="{{ asset('img/GARDEN_LOGO.png') }}" alt="Garden Of Eden Produce" style="width: 30px">
                <span class="visible-xs">
                    <b>Garden Of Eden Produce</b>
                </span>
            </a>
        </div>
        <!-- end logo -->
        <div class="navbar-right">
            <!-- search form -->
            <form id="navbar-search" class="navbar-form search-form">
                <h4>Garden Of Eden Produce</h4>
            </form>
            <!-- end search form -->

        </div>
    </div>
</nav>