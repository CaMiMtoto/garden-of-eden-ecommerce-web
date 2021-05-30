@extends('layouts.master')
@section('title','Orders')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel rounded-sm shadow-sm panel-default">
                <div class="panel-heading bg-white">
                    <h4 class="panel-title">
                        <i class="fa fa-square"></i> Manage Orders
                    </h4>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-condensed table-hover table-border rounded"
                           id="manageTable">
                        <thead>
                        <tr>
                            <th>Oder Date</th>
                            <th>Client Name</th>
                            <th>Client Phone</th>
                            <th>Payment Type</th>
                            <th>Order status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- edit product  -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal validate-form" method="post" id="editForm"
                      action="{{ route('orders.mark') }}" enctype="multipart/form-data" novalidate>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-pencil"></i>
                            Order details
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div id="edit-messages"></div>
                        <div class="modal-loading div-hide"
                             style="width: 50px;margin: auto;padding-top: 50px;padding-bottom: 50px;">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="edit-result">
                        </div>
                        <!-- END TABS PILL STYLE -->
                    </div> <!-- /modal-body -->

                    <div class="modal-footer  editFooter">
                        <button type="submit" class="btn btn-primary" id="editBtn" data-loading-text="Loading...">
                            <i class="glyphicon glyphicon-ok-sign"></i> Save Changes
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-remove-sign"></i>Close
                        </button>
                    </div> <!-- /modal-footer -->
                </form> <!-- /.form -->
            </div> <!-- /modal-content -->
        </div> <!-- /modal-dailog -->
    </div>
    <!-- /  -->


@endsection

@section('scripts')
    <script>

        var defaultUrl = "{{ route('orders.all')  }}";
        var table;
        var manageTable = $("#manageTable");

        function myFunc() {
            window.table = manageTable.DataTable({
                "bProcessing": true,
                "serverSide": true,
                "order": [[0, "desc"]],
                ajax: {
                    url: defaultUrl,
                    method: 'POST',
                    dataSrc: 'data',
                    data: {_token: "{{csrf_token()}}"}
                },
                columns: [
                    {data: 'created_at', 'sortable': true},
                    {
                        data: 'clientName', 'sortable': true,
                        render: function (data, type, row) {
                            if (row.user) {
                                return row.user.name;
                            }
                            return data;
                        }
                    },
                    {
                        data: 'clientPhone', 'sortable': true,
                        render: function (data) {
                            return "<a href='tel:'" + data + "'>" + data + "</a>";
                        }
                    },
                    {
                        data: 'payment_type', 'sortable': true,
                        render: function (data) {
                            let color = "primary";
                            if (data === "{{ \App\Payment::CardMobileMoney }}") {
                                color = "success";
                            }
                            return `<span class='label label-${color} rounded-pill'>${data}</span>`;
                        }
                    },
                    {
                        data: 'status', 'sortable': true,
                        render: function (data) {
                            if (data === "{{\App\Order::PENDING}}") {
                                return "<a class='label label-warning'>" + data + "</a>";
                            } else if (data === "{{\App\Order::PROCESSING}}") {
                                return "<a class='label label-info'><i class='fa fa-spinner'></i> " + data + "</a>";
                            } else if (data === "{{\App\Order::CANCELLED}}") {
                                return "<a class='label label-danger '><i class='fa fa-close'></i> " + data + "</a>";
                            } else if (data === "{{\App\Order::ON_WAY}}") {
                                return "<a class='label label-primary '><i class='fa fa-bicycle'></i> " + data + "</a>";
                            } else if (data === "{{\App\Order::DELIVERED}}") {
                                return "<a class='label label-success'><i class='fa fa-check'></i> " + data + "</a>";
                            } else if (data === "{{\App\Order::PAID}}") {
                                return "<a class='label bg-green'><i class='fa fa-check-circle'></i> " + data + "</a>";
                            }
                            return "<a class='label label-default '><i class='fa fa-check-circle-o'></i> " + data + "</a>";
                        }
                    },
                    {
                        data: 'id',
                        'sortable': false,
                        render: function (data, type, row) {
                            return "<div class='btn-group btn-group-sm'>" +
                                "<button class='btn btn-default js-details' " +
                                "data-url='/admin/orders/" + row.id + "' data-id='" + row.id + "'> Details</button>" +
                                "</div>";
                        }
                    }
                ]
            });
        }


        $(document).ready(function () {

            $('.nav-orders').addClass('active');
            myFunc();

            manageTable.on("click", ".js-details", function () {
                var findUrl = $(this).attr("data-url");
                // Launching edit modal
                $("#editModal").modal();
                // edit products messages
                $("#edit-messages").html("");
                // modal spinner
                $('.modal-loading').removeClass('div-hide');
                // modal result
                var editResultDiv = $('.edit-result');
                editResultDiv.addClass('div-hide');
                //modal footer
                var footer = $(".editFooter");
                footer.addClass('div-hide');
                $.ajax({
                    url: findUrl,
                    method: "get"
                }).done(function (response) {

                    // modal spinner
                    $('.modal-loading').addClass('div-hide');
                    // modal result
                    editResultDiv.removeClass('div-hide');
                    //modal footer
                    footer.removeClass('div-hide');
                    editResultDiv.html(response);
                }).fail(function (error) {
                    alert("Error getting data");
                });
                return false;
            });


            //submit add new  form
            $("#submitProductForm").submit(function (e) {
                e.preventDefault();
                var form = $(this);
                form.parsley().validate();
                if (!form.parsley().isValid()) {
                    return false;
                }


                var formData = new FormData(this);
                $("#createBtn").button('loading');
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (response) {
                    // button loading
                    $("#createBtn").button('reset');
                    //resetting form
                    form[0].reset();
                    // reload the manage member table
                    table.ajax.reload();
                    $('#add-messages').html('<div class="alert alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '
                        + " Product added successfully" + '</div>');
                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                            $("#addModal").modal('hide');
                        });
                    }); // /.alert
                }).fail(function () {
                    alert("Some errors");
                    $("#createBtn").button('reset');
                });
            });

            // submit of edit  form
            $("#editProductForm").submit(function (e) {
                e.preventDefault();
                var form = $(this);
                form.parsley().validate();
                if (!form.parsley().isValid()) {
                    return false;
                }

                var formData = new FormData(this);
                // button loading
                $("#editBtn").button('loading');
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (response) {
                    // button loading
                    $("#editBtn").button('reset');
                    form[0].reset();
                    // reload the manage member table
                    table.ajax.reload();

                    $('#edit-messages').html('<div class="alert alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + "Product successfully updated" + '</div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                            $("#editModal").modal('hide');
                        });
                    }); // /.alert
                }).fail(function (error) {
                    alert("Some errors occurred");
                    $("#editBtn").button('reset');
                });
            });
        });
    </script>
@stop
