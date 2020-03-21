@foreach($postsubCategoryList as $subcategory)
    <ul style="font-size: medium">
        <li>{{$subcategory->title}}</li>
        @if(count($subcategory->subcategory))
            @include('admin.postsubCategoryList',['postsubCategoryList' => $subcategory->subcategory])
        @endif
    </ul>
@endforeach
