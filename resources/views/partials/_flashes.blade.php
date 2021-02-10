@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible rounded-sm shadow-lg z-index-high" role="alert"
         style="position:fixed;top: 0;right: 0;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <span class="fa fa-check-circle"></span> {{ session('success') }}
    </div>
@endif
