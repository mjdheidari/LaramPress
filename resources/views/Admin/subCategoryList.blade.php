@foreach($subcategories as $subcategory)
    <ul style="font-size: medium">
        <li>{{$subcategory->title}}</li>
        @if(count($subcategory->subcategory))
            @include('admin.subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
    </ul>
@endforeach
