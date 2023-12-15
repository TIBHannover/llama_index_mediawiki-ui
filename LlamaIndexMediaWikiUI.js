$(document).ready(function() {
    $('#submitButton').click(function() {
        $('#loadingBar').show();
        var query = $('#queryInput').val();
        $.ajax({
            type: 'GET',
            url: mw.config.get('egLlamaIndexMediaWikiServiceURL') + '/query?query=' + query,
            success: function(response) {
                $('#responseArea').text(response);
            },
            complete: function() {
                $('#loadingBar').hide();
            }
        });
    });
});