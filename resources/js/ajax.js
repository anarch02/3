import $ from 'jquery';
window.$ = $;

import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
 

$('#add-form').on('submit', function(event){
    event.preventDefault();

    var url = $(this).attr('data-action');

    $.ajax({
        url: url,
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(response)
        {
            if(response)
            {
                Swal.fire(
                    'Created!',
                    'You clicked the button!',
                    'success'
                )
            }
            $('.table').load(location.href+ ' .table');
        },
        error: function(err) {
            let error = err.responseJSON;
            $.each(error.errors, function(index, value){
                $('.errorsMessage').append('<span class="text-danger">'+value+'</span><br>');
            });
        }
    });
});

// $('body').on('click', '#update-admin-button', function(){
//     var id = $(this).data('id');
//     var name = $(this).data('name');
//     var email = $(this).data('email');

//     $('#up_id').val(id);
//     $('#up_name').val(name);
//     $('#up_email').val(email);
// });

$(function() {
    $('#search-input').on('keyup', function() {
        var searchTerm = $(this).val();

        $.ajax({
            url: '/search',
            type: 'GET',
            data: { searchTerm: searchTerm },
            dataType: 'json',
            success: function(results) {
                $('#search-results').empty();

                if (results.length > 0) {
                    $.each(results, function(index, result) {
                        var link = '<a href="' + result.url + '">' + result.name + '</a>';
                        var description = '<p>' + result.description + '</p>';
                        $('#search-results').append(link + description);
                    });
                } else {
                    $('#search-results').append('<p>No results found</p>');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
            }
        });
    });
});
