@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible alert_custom" role="alert">
        <a href="javasctipt:(0);" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></a>
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('failed'))
    <div class="alert alert-danger alert-dismissible alert_custom" role="alert">
        <a href="javasctipt:(0);" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></a>
        {{ session()->get('failed') }}
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible alert_custom" role="alert">
        <a href="javasctipt:(0);" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></a>
        {{ session()->get('warning') }}
    </div>
@endif
<script>
    // $(".alert_custom").fadeTo(4500, 500).slideUp(500, function(){
    //     $(".alert_custom").slideUp(500);
    // });
</script>
