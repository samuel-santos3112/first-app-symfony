/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


var container = $('.js-like-dislike');

container.find('a').on('click', function(e){
    e.preventDefault();

    var id = Math.floor(Math.random() * 100);
    var link = $(e.currentTarget);
    var data = link.data('like');
    var url = '/messages/' + id + '/like/' + data;
    var dataLike = $('#js-total-likes').text();

    $.ajax({
        method: 'POST',
        url: url,
        data: { currentLike : dataLike }
    }).then(function(response) {
        $('#js-total-likes').text(response.likes);
    });
});

