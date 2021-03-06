<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>--}}
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/locales/(lang).js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="{{asset('src/plugins/ckeditor/ver_5/ckeditor.js')}}"></script>
{{--<script src="{{asset('src/plugins/ckeditor/ver_4/ckeditor.js')}}"></script>--}}
<script>
    function CKEditorChange(name,fileName) {
        CKEDITOR.replace(name,{
            customConfig: fileName,
        });
    }
    function getSubcategories(categoryId,AppendId) {
        if(categoryId != null || categoryId != ''){
            $.ajax({
                url:'{{url("aPanel/getSubCategories/list")}}'+'/'+categoryId,
                method:"GET",
                success:function (subCategoriesData) {
                    $("#"+AppendId).empty();
                    if(subCategoriesData.code == true){
                        $(".subcategory").text('*');
                        $("#"+AppendId).attr('required','required');
                        $("#"+AppendId).append('<option value="">Select SubCategory Name</option>');
                        $.each(subCategoriesData.data, function(subCategoryIndex, subCategoryValue) {
                            $("#"+AppendId).append('<option value="' + subCategoryValue.id + '">' + subCategoryValue.name + '</option>');
                        });
                    }else{
                        $("#"+AppendId).append('<option value="">No SubCategories Found</option>');
                        $(".subcategory").text('');
                        $("#"+AppendId).removeAttr('required');
                    }
                }
            });
        }else{
            $("#"+AppendId).empty();
            $("#"+AppendId).append('<option value="">Select SubCategory Name</option>');
            $(".subcategory").text('');
            $("#"+AppendId).removeAttr('required');
        }
    }
</script>
