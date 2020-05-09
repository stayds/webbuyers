<div class="action_links">
    <ul>
        <li class="wishlist">

            <a href="{{route('wishlist.add',['productid'=>Crypt::encrypt($list->productid)] )}}" title="Add to Wishlist">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
        </li>

{{--        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="ion-ios-search-strong"></span></a></li>--}}
    </ul>
</div>
