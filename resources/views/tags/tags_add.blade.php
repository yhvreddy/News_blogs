<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-tags"></i> Add Tags</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form method="post" action="{{route('newTag.save')}}" id="newTagData">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="Name">Tag Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="" required class="form-control">
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="col-md-12 form-group">
                    <input type="submit" name="submit" value="Add Tag" class="btn btn-primary pull-right" id="SubmitTag">
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
