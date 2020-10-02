//require('./bower_components/jquery/dist/jquery.min.js');

function addNewUsers(popUpId,url) {
    $.ajax({
        url : url,
        method: 'GET',
        success:function (data) {
            $("#"+popUpId).html('');
            $("#"+popUpId).append(data);
            $("#"+popUpId).modal({ show: 'false', backdrop: 'static', keyboard: 'false' });
        }
    })
}
