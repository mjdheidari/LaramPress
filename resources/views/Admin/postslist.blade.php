@extends('layouts.admin')
@section('page-title')
    مشاهده تمام پست های منتشر شده
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        لیست پست ها
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th>چکیده</th>
                                        <th>نویسنده</th>
                                        <th>اعمال تغییرات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="text-center">
                                                <strong>
                                                    <a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
                                                </strong>
                                            </td>
                                            <td class="text-center">{{$post->excerpt}}</td>
                                            <td class="text-center">{{$post->author}}</td>
                                            <td>
                                                <form action="{{route('posts.destroy' , $post->id)}}" method="post">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="fa fa-trash"></i> حذف
                                                    </button>
                                                    <a class="btn btn-xs btn-primary"
                                                       href="{{route('posts.edit',$post->id)}}"><i
                                                            class="fa fa-edit"></i> ویرایش</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
