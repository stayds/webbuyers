<div class="col-xl-12">
    <div class="card-box">
        <div class="dropdown float-right">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Refresh</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Category name</th>
                    <th>Description</th>
                    <th class="text-center">Number of Products</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                        <?php $count = 0 ?>
                    @forelse($category as $list)

                        <tr>
                            <td>{{++$count}}</td>
                            <td class="text-capitalize">{{$list->prodcatname}}</td>
                            <td>
                                @if($list->description == null)
                                    <span> No data exists </span>
                                @else
                                    {{$list->description}}
                                @endif
                            </td>
                            <td class="text-center bold"><span>{{count($list->products)}}</span></td>
                            <td class="
">
                                <span class="badge @if($list->status) badge-success @else badge-danger @endif">
                                    {{ ($list->status)? "enabled" : "disabled"  }}
                                </span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target=".category"><i class="fa fa-edit"></i> Edit</a>
                                @if($list->status > 0)
                                    <a href="{{route('disable.category',$list->prodcatid)}}" class="btn btn-danger btn-xs"><i class="fa fa-close" id="sa-params"></i> Disable</a>
                                @else
                                    <a href="{{route('disable.category',$list->prodcatid)}}" class="btn btn-primary btn-xs"><i class="fa fa-check-circle" id="sa-params"></i> Enable</a>
                                @endif

                            </td>
                        </tr>
                        @empty
                            <tr><div class="text-center alert alert-danger"></div> </tr>
                        @endforelse

                </tbody>
            </table>
            <div style="align-content: center; margin-top: 30px" align="center" class="text-center"> {{ $category->links() }}</div>

        </div>
    </div>
</div>
