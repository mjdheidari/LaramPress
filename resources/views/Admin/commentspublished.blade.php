@extends('layouts.admin')
@section('link')
    <link href="/admintheme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection
@section('page-title')
    مدیریت نظرات کاربران
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        لیست نظرات منتشر شده
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                @if(Session::has('msg'))
                    <div id="alert1" class="alert alert-success ">
                        {{ (string)Session::get('msg') }}
                    </div>
                    <script>
                        $('#alert1').delay(3000).fadeOut('slow');
                    </script>
                @endif

                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr >
                                        <th >نام کاربر</th>
                                        <th >ایمیل</th>
                                        <th>دیدگاه کاربر</th>
                                        <th>مشاهده</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cmnts as $cmnt)
                                        <tr>
                                            <td width="20%" class="text-center">{{$cmnt->name}}</td>
                                            <td width="20%" class="text-center">{{$cmnt->email}}</td>
                                            <td width="45%" class="text-center">{{substr($cmnt->comment, 0 , 99)}}</td>
                                            <td width="15%" class="text-center">
                                                <button id="{{$cmnt->id}}" class="showcmnt btn btn-success">
                                                    مشاهده
                                                </button>
                                            </td>
                                            {{--<td><a href=""><i class="fa fa-edit"></i> ویرایش</a></td>--}}
                                        </tr>
                                    @endforeach

                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 id="modal-title" class="modal-title"></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div style="width: 85%; margin: auto">
                                                    <div class="row">
                                                        <strong id="usrname" style="color: red;font-size: large;padding-right: 15px"></strong>
                                                        (ایمیل : <label id="usremail"></label>)
                                                        <br>
                                                        <strong id="status" style="padding-right: 15px">منتشر شده</strong>
                                                    </div>

                                                    <br>
                                                    <p id="comment"></p>
                                                    <hr>
                                                    <div class="text-center" style="padding-bottom: 10px;">
                                                        <a id="trash" class="btn btn-danger">انتقال به زباله دان</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(".showcmnt").click(function () {
                                            var Id = $(this).attr("id");
                                            $.ajax({
                                                url: "{{ route("comments.detail")}}",
                                                type: 'GET',
                                                dataType: "json",
                                                data: {"ide": Id},
                                                success: function (data) {
                                                    $('#modal').modal('show');
                                                    $("#trash").attr('href',"{{url('trashcomment')}}"+ "/" +data[0]['id']);                                                    $("#modal-title").html(data[0]['post']);
                                                    $("#usrname").html(data[0]['name']);
                                                    $("#comment").html(data[0]['comment']);
                                                    $("#usremail").html(data[0]['email']);
                                                }
                                            });
                                        });
                                    </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('table-script')
    <script src="/admintheme/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/admintheme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/admintheme/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/admintheme/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/admintheme/vendors/pdfmake/build/vfs_fonts.js"></script>
@endsection
