<form action="{{ route('productsearch') }}" method="get">
    @csrf
    <div class="hover_category">
        <select class="select_option" name="prodcatid"  id="categori1">
            <option value="" selected>All Categories</option>
            @foreach($category as $catlist)
                <option value="{{$catlist->prodcatid}}">{{$catlist->prodcatname}}</option>
            @endforeach
        </select>
    </div>
    <div class="search_box">
        <input placeholder="Search product..." type="text" name="productname" value="{{ old('prodcatid') }}">
        <button type="submit">Search</button>
    </div>
</form>