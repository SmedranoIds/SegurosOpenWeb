'use strict';
var $ = jQuery;
var thread_like = like_vars.thread;
var COOKIE_NAME_LIKES = 'bbvaLikes-' + thread_like;
var LIKE_BUTTON_DEFAULT = 'Me gusta';
//http://d16kt6wtlv4mqr.cloudfront.net/bbva-components/likes?&thread=URL_ACTUAL%20o%20ID%20%C3%BAnico%20por%20proyecto&project=j2a5u92l3
var url = 'http://d16kt6wtlv4mqr.cloudfront.net/bbva-components/likes/';
var params = {
    thread: thread_like,
    project: 'itzngcoi'
};

function setLike() {
    $.post(url, params, function(data) {
        var nLikes = parseInt($('.likeCounter').html());
        $('.likeCounter').html(nLikes+1);
        Cookies.set(COOKIE_NAME_LIKES, true, { expires: 30, path: '/' });
        $('.likeButton').attr('disabled', true);
        $('.likeButton').addClass('disabled');
    }).fail(function(){

    });
}

function drawLikeButton() {
    var likeLabel = like_vars.likeLabel || LIKE_BUTTON_DEFAULT;
    var likeButtonClass = (Cookies.get(COOKIE_NAME_LIKES)) ? 'disabled' : '';
    var buttonHTML = '<input type="button" ' + likeButtonClass + ' class="likeButton ' + likeButtonClass + '" onclick="setLike()" id="likeButton" value="' + likeLabel + '">';
    return buttonHTML;
}

function getLikes() {

    $.get(url, params, function(data) {
        $('.likeCounter').html(data.data);
    }).fail(function(){
        $('.likeCounter').html(0);
    });
}

function drawLikeCounter() {
    return '<label class="likeCounter"></label>'
}

function drawLikeComponent() {
    var button = drawLikeButton();
    var counter = drawLikeCounter();
    $('#likesContainer').append(button);
    $('#likesContainer').append(counter);
}

$(document).ready(function() {
    drawLikeComponent();
    getLikes();
});