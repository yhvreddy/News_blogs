<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-list-alt"></i> Categories List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped customDataTable">
                <thead>
                <tr class="bg-primary">
                    <th width="20">#</th>
                    <th></th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td align="center" width="50">
                                @if(isset($category->image_link) && file_exists($category->image_link))
                                    <img src="{{asset($category->image_link)}}">
                                @else
                                    <img src="{{asset('default_images/image.svg')}}">
                                @endif
                            </td>
                            <td>{{$category->name}}</td>
                            <td width="100" align="center">
                                <span data-toggle="tooltip" title="Edit"><a href="javascript:0;"><i class="fa fa-edit fa_s20"></i></a></span>&nbsp;
                                <span data-toggle="tooltip" title="Delete"><a href="javascript:0;"><i class="fa fa-trash-o fa_s20"></i></a></span>&nbsp;
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>
