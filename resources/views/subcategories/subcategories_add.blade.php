<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-list"></i> Add SubCategories</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form method="post" action="{{route('saveSubCategoryData')}}" enctype="multipart/form-data" id="newCategoryData">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="category">Select Category <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="category_id" required>
                        <option value="">Select Category Name</option>
                        @foreach($categories as $key => $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <label for="Name">SubCategory Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="" required class="form-control">
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
{{--                <div class="col-md-12 form-group">--}}
{{--                    <label for="icon">Category Icon <span class="text-danger">*</span></label>--}}
{{--                    <input type="file" name="icon" placeholder="" required class="form-control fileUploadPlugInCustom" data-show-preview="false" accept=".png,.svg,.jpeg,.jpg" data-msg-placeholder="Upload Category Icon">--}}
{{--                    @error('icon')--}}
{{--                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

                <div class="col-md-12 form-group">
                    <input type="submit" name="submit" value="Add SubCategory" class="btn btn-primary pull-right" id="SubmitCategory">
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
