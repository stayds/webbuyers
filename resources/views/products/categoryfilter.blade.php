<div class="widget_list widget_categories">
    <h2>Shop by Category</h2>
    <ul>
        @foreach($category as $list)
            <li><a href="{{url('/product/list',$list->prodcatid)}}" class="text-capitalize"> {{$list->prodcatname}}</a></li>
        @endforeach
    </ul>
</div>
