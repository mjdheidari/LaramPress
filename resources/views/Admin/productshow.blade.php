@extends('layouts.admin')
@section('link')
@endsection
@section('page-title')
    صفحه محصول
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$product->name}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="product-image">
                            <img src="{{env('Product_img').$product->main_image}}" alt="{{$product->name}}"/>
                        </div>

                        <div class="product_gallery">
                            @foreach($images as $img)
                                <a>
                                    <img src="{{env('Product_img').$img->path}}" alt="{{$product->name}}"/>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                        <h3 class="prod_title">مشخصات محصول</h3>
                        <p>{{$product->body}}</p>
                        <br/>

                        <div>
                            <h2>وضعیت</h2>
                            @if($product->status == '1')
                                <p>موجود</p>
                            @else
                                <p>ناموجود</p>
                            @endif
                        </div>
                        <br/>
                        <div>
                            <h2>برند</h2>
                            @if($product->brand)
                                <p>{{$product->brand}}</p>
                            @else
                                <p>برندی برای این محصول ثبت شنده است.</p>
                            @endif
                        </div>
                        <br/>

                        <div class="">
                            <h2>دسته بندی</h2>
                            @if(empty($product->cat))
                                <ul class="list-inline prod_size">
                                    <li>
                                        <a class="btn-primary btn-sm btn">دسته بندی نشده</a>
                                    </li>

                                </ul>
                            @else
                                <ul class="list-inline prod_size">
                                    @php $cats = explode("%" , $product->cat); @endphp
                                    @foreach($cats as $cat)
                                        <li>
                                            <a class="btn-primary btn-sm btn">{{$cat}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <br/>
                        <?php
                        $p = $product->price;
                        $d = $product->discount;
                        function dis($p, $d)
                        {
                            if ($d != "") {
                                $rp = $p * (100 - $d) / 100;
                                return $rp;
                            }
                        }
                        ?>
                        <div class="">
                            <div class="product_price">
                                <h1 class="price">{{$product->price}} تومان</h1>
                                <span class="price-tax">
                                    @if($product->discount != "")
                                        با احتساب تخفیف {{$product->discount}} درصدی : {{dis($p , $d)}} تومان
                                    @else
                                        این محصول تخفیفی ندارد.
                                    @endif
                                </span>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <form style="display: inline-block" action="{{route('product.destroy' , $product->id)}}"
                                  method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-lg">حذف محصول</button>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-lg">ویرایش
                                    محصول</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
