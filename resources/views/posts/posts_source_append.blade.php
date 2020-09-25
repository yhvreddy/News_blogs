@if($id == 'urls')
    <div class="addSourceLinks row">
        <input type="hidden" value="urls" name="sourceTypes[]">
        <div class="col-md-4 form-group">
            <input type="text" name="sourceTitle[]" required class="form-control" placeholder="Title *">
        </div>
        <div class="col-md-6 form-group">
            <input type="url" name="sourceUrls[]" required class="form-control" placeholder="Url Link *">
        </div>
        <div class="col-md-2">
            <a href="javascript:0;" class="btn btn-danger removeAppendSources"> - Remove</a>
        </div>
    </div>
@else
    <div class="addSourceFiles row">
        <input type="hidden" value="files" name="sourceTypes[]">
        <div class="col-md-4 form-group">
            <input type="text" name="sourceTitle[]" required class="form-control" placeholder="Title *">
        </div>
        <div class="col-md-6 form-group">
            <input type="file" name="sourcesFiles[]" required placeholder="" required class="form-control fileUploadPlugInCustom" data-show-preview="false" accept=".png,.mp4,.avg,.zip,.rar,.svg,.jpeg,.jpg" data-msg-placeholder="Upload Files *">
        </div>
        <div class="col-md-2">
            <a href="javascript:0;" class="btn btn-danger removeAppendSources"> - Remove</a>
        </div>
        <script>
            $(".fileUploadPlugInCustom").fileinput({'showUpload':false, 'previewFileType':'any'});
        </script>
    </div>

@endif
