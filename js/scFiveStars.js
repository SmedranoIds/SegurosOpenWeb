'use strict';
var $ = jQuery;
var thread_stars = stars_vars.thread;
var COOKIE_NAME_STARS = 'bbvaVotes-' + thread_stars;
var starsDrawn = 0;
//http://d16kt6wtlv4mqr.cloudfront.net/bbva-components/average?&thread=/post/de/inserci%C3%B3n&project=j2a5u92lv
var url = 'http://d16kt6wtlv4mqr.cloudfront.net/bbva-components/average';
var params = {
    thread: thread_stars,
    project: 'j2a5u92l'
};

function drawStars() {
    var starsHTML = '<div class="bbvaVotes-div">';
    for(var i=0; i<=4; i++) {
        starsHTML += '<span class="star no-color"></span>';
    }
    starsHTML += '</div>';

    $('#starsContainer').append(starsHTML);

    $.get(url, params, function(data) {
        if(data) fillStars(data.average);
    }).error(function(){

    });

}

function fillStars(points) {
    points = points || starsDrawn;
    $('.star').removeClass('no-color');

    var star = $('.bbvaVotes-div').children().last();
    for (var i = $('.bbvaVotes-div').children().length; i > points; i--) {
        star.addClass('no-color');
        star = star.prev();
    }
};

$(document).ready(function() {
    drawStars();
    $('.star').mouseenter(function (event) {
        if (!Cookies.get(COOKIE_NAME_STARS)) {
            fillStars($(event.target).index() + 1);
        }
    });
    $('.bbvaVotes-div').mouseleave(function () {
        if (!Cookies.get(COOKIE_NAME_STARS)) {
            fillStars();
        }
    });

    $('.star').click(function (event) {
        if(!Cookies.get(COOKIE_NAME_STARS)) {
            var points = $(event.target).index() + 1;
            var postUrl = url + '?&thread=' + thread_stars + '&project=' + params.project;
            var postParams = {
                points: points
            };
            $.post(postUrl, postParams, function(data) {
                if(data) fillStars(data.average);
                Cookies.set(COOKIE_NAME_STARS, true, { expires: 30, path: '/' });
            }).error(function(){

            });
        }
    });
});