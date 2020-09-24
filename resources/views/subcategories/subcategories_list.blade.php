<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-list"></i> SubCategories List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped customDataTable">
                <thead>
                <tr class="bg-primary">
                    <th width="20">#</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th width="100">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($subCategories as $key => $subCategory)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$subCategory->category_name}}</td>
                            <td>{{$subCategory->name}}</td>
                            <td align="center">
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
