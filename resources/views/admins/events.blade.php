@extends('layouts.master')
@section('title','Categories')

@section('content')
    <div class="section-heading">
        <h1 class="page-title">Events</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel flat">
                <div class="panel-heading flat">
                    <h4 class="panel-title">
                        <i class="fa fa-square"></i> Events
                        <span class="clearfix"></span>
                    </h4>
                    <hr>
                </div>
                <div class="panel-body panel-content">
                    <table class="table table-condensed table-bordered table-striped table-responsive table-hover" id="manageTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Active</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!-- edit categories  -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form novalidate class="form-horizontal" id="editForm" action="{{ route('events.update') }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-pencil"></i> Edit event</h4>
                    </div>
                    <div class="modal-body">
                        <div id="edit-messages"></div>

                        <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Loading...</span>
                        </div>

                        <div class="edit-result">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                            <div class="form-group">
                                <label for="editEventName" class="col-sm-4 control-label">Event Name</label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7">
                                    <input required type="text" class="form-control" id="editEventName" placeholder="Event Name" name="name" autocomplete="off">
                                </div>
                            </div> <!-- /form-group-->
                            <div class="form-group">
                                <label for="editEventDate" class="col-sm-4 control-label">Event Date</label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7">
                                    <input required type="date" class="form-control" id="editEventDate" placeholder="Event Date" name="date" autocomplete="off">
                                </div>
                            </div> <!-- /form-group-->
                            <div class="form-group">
                                <label for="editEventDescription" class="col-sm-4 control-label">Event Description</label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7">
                                    <textarea required class="form-control" id="editEventDescription" placeholder="Event Description" name="description" autocomplete="off"></textarea>
                                </div>
                            </div> <!-- /form-group-->
                            <div class="form-group">
                                <label for="editEventActive" class="col-sm-4 control-label"></label>
                                <label class="col-sm-1 control-label"> </label>
                                <div class="col-sm-7">
                                    <div class="fancy-checkbox">
                                        <label>
                                            <input type="checkbox" id="editEventActive" name="active" >
                                            <span> Show event</span>
                                        </label>
                                    </div>
                                </div>
                            </div> <!-- /form-group-->
                        </div>
                        <!-- /edit brand result -->

                    </div> <!-- /modal-body -->

                    <div class="modal-footer editFooter">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                            <button type="submit" class="btn btn-primary" id="editBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                        </div>
                    </div>
                    <!-- /modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /modal-content -->
        </div>
        <!-- /modal-dailog -->
    </div>
    <!-- /categories  -->




    <script>

        var defaultUrl = "{{ route('events.all')  }}";
        var table;
        var manageTable = $("#manageTable");

        function myFunc() {
            table = manageTable.DataTable({
                "bProcessing": true,
                "serverSide": true,
                ajax: {
                    url: defaultUrl,
                    method: 'POST',
                    dataSrc: 'data',
                    data: {_token: "{{csrf_token()}}"}
                },
                columns: [
                    {data: 'name', 'sortable': false},
                    {data: 'date', 'sortable': false},
                    {data: 'description', 'sortable': false},
                    {data: 'active', 'sortable': false,
                        render: function (data) {
                            if(data){
                                return "<span class='label label-info'>Yes</span>";
                            }
                            return "<span class='label label-warning'>No</span>";
                        }
                    },
                    {
                        data: 'id',
                        'sortable': false,
                        render: function (data, type, row) {
                            return "<div class='btn-group btn-group-sm'>" +
                                "<button class='btn btn-default btn-sm flat js-edit' " +
                                "data-url='/admin/events/show/" + row.id + "' data-id='" + row.id + "'> " +
                                "<i class='glyphicon glyphicon-edit'></i></button>";
                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $('.nav-events').addClass('active');
            myFunc();


            manageTable.on("click", ".js-edit", function () {
                var findUrl = $(this).attr("data-url");
                // remove hidden  id text
                $('#id').remove();
                // Launching edit modal
                $("#editModal").modal();
                // edit categories messages
                $("#edit-messages").html("");
                // modal spinner
                $('.modal-loading').removeClass('div-hide');
                // modal result
                $('.edit-result').addClass('div-hide');
                //modal footer
                var footer = $(".editFooter");
                footer.addClass('div-hide');
                $.ajax({
                    url: findUrl,
                    method: "get",
                    dataType: "json"
                }).done(function (response) {
//                    console.log(response);
                    // modal spinner
                    $('.modal-loading').addClass('div-hide');
                    // modal result
                    $('.edit-result').removeClass('div-hide');
                    //modal footer
                    footer.removeClass('div-hide');
                    // set the categories name
                    $("#editEventName").val(response.name);
                    $("#editEventDate").val(response.date);
                    $("#editEventDescription").val(response.description);
                    $("#editEventActive").prop('checked',response.active);
                    // add the categories id
                    footer.after('<input type="hidden" name="id" id="id" value="' + response.id + '" />');
                }).fail(function (error) {
                    alert("Error getting data");
                });
                return false;
            });
        });
    </script>
@endsection