@extends('layouts.admin')
@section('link')
    <link href="/admintheme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection
@section('page-title')
    ویرایش برگه ها
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        لیست برگه ها
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
                                    <tr>
                                        <th>نام برگه</th>
                                        <th>محتوا</th>
                                        <th>ویرایش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td width="20%" class="text-center">{{$page->page}}</td>
                                            <td width="20%" class="text-center">
                                                @isset($page->data)
                                                    @php($data = substr($page->data,0,100))
                                                    {{$data}}
                                                @else
                                                    بدون محتوا
                                                @endisset
                                            </td>
                                            <input type="hidden" id="{{$page->id}}" value="{{$page->data}}">
                                            <td width="15%" class="text-center">
                                                <button id="{{$page->id}}" class="showmodal btn btn-success">
                                                    ویرایش برگه
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach

                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 id="modal-title" class="modal-title"></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="form" action="" method="post">
                                                    @csrf @method('PUT')
                                                    <div id="sample" style="width: 85%; margin: auto"><br>
                                                        متن موجود در برگه
                                                        <br>
                                                        <textarea class="form-control" name="data" id="info"
                                                                  rows="3"></textarea>
                                                        <hr>
                                                        <div class="text-center" style="padding-bottom: 10px;">
                                                            <button  class="btn btn-success">ثبت اطلاعات
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(".showmodal").click(function () {
                                            var Id = $(this).attr("id");
                                            $.ajax({
                                                url: "{{ route('page.show',2)}}",
                                                type: 'GET',
                                                dataType: "json",
                                                data: {"ide": Id},
                                                success: function (data) {
                                                    $('#modal').modal('show');
                                                    if (data[0]['page'] == 'contact-us') {
                                                        var id = data[0]['id'];
                                                        $("#modal-title").html('ویرایش برگه تماس با ما');
                                                        $("#form").attr('action' , window.location.origin + "/page/"+data[0]['id']);
                                                        $("#info").val($("#"+id).val());
                                                    }
                                                    if (data[0]['page'] == 'about-us') {
                                                        var id = data[0]['id'];
                                                        $("#modal-title").html('ویرایش برگه ارتباط با ما');
                                                        $("#form").attr('action' , window.location.origin + "/page/"+data[0]['id']);
                                                        $("#info").val($("#"+id).val());
                                                    }
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
