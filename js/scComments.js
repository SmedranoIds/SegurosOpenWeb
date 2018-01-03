'use strict';
var $ = jQuery;
var thread_comments = php_vars.thread;
var parentId = -1;
var LOPD_ERROR_DEFAULT = 'Debe aceptar el LOPD';
var MAIL_ERROR_DEFAULT = 'El formato del correo no es correcto';
var ANSWER_DEFAULT = 'Responder';
var OK_DEFAULT = 'El comentario ha sido enviado';
var ERROR_DEFAULT = 'Error al enviar el comentario';
var CAPTCHA_ERROR_DEFAULT = 'Error en el captcha';
var MSG_PRIVATE_READ_DEFAULT = 'Debe estar registrado para ver comentarios';
var AUTHOR_DEFAULT = false;

$(document).ready(function() {
    var captcha = (php_vars.captcha === 'true');
    var privateRead = (php_vars.privateRead === 'true');
    if(!privateRead) {
        getComments();
    }else {
        privateCommentsAdvise();
    }
    if(captcha) drawCaptcha();

    $('#sendComment').on('click', function() {
        resetFields();
        checkForm();
    });

});

function privateCommentsAdvise(){
    var msgPrivateRead = php_vars.msgPrivateRead || MSG_PRIVATE_READ_DEFAULT;

    $('#commentWrapper').html(msgPrivateRead);
}

function drawCaptcha() {
    var url = '/bbva-components/captcha/';

    var params = {
        project: 'j2a5u92l',
        thread: thread_comments
    };

    $.get(url, params, function(data) {
        var captchaHTML = '<img class="bbvaComments-image-captcha" src="data:image/jpeg;charset=utf-8;base64,'+ data.data.captcha +'"/>';
        captchaHTML += '<img class="bbvaComments-new-captcha" src="'+$this.libs+'assets/img/icon-refresh.png"/>';
        captchaHTML += '<input class="bbvaComments-captcha" type="text">';

        $('.bbvaComments-div-captcha').append(captchaHTML);

    });
}

function getComments() {
    //http://d16kt6wtlv4mqr.cloudfront.net/bbva-components/comments?&thread=URL_ACTUAL%20o%20ID%20%C3%BAnico%20por%20proyecto&project=j2a5u92l
    /*
    var url = '/bbva-components/comments/';

    var params = {
        project: 'j2a5u92l',
        thread: thread_comments
    };

    $.get(url, params, function(data) {

    });
    */
    var data = [{"date":"20170509092744742","replies":[{"date":"20170509092837245","alias":"Un usuario","content":"Hola qué tal?","email":"unusuario@hola.com"},{"date":"20170509092905739","alias":"otro usuario","content":"Pues aquí andamos","email":"otrousuario@hola.com"}],"alias":"aaaaa","content":"ola","email":"aaaa@aaa.com"},{"date":"20170509092944547","replies":[],"alias":"Un usuario","content":"Otro hilo por aquí","email":"unusuario@hola.com"}];

    drawComments(data);
}

function replyComment(index) {
    parentId = index;
    $('#commentsAlias').val('');
    $('#commentsEmail').val('');
    $('#commentsReply').val('');
    $('#commentsAlias').focus();
}

function formatCommentDate(date) {
    var year = date.substring(0,4);
    var month = date.substring(4,6);
    var day = date.substring(6,8);
    var hour = date.substring(8,10);
    var minute = date.substring(10,12);
    var second = date.substring(12,14);

    return day + '/' + month + '/' + year + ' ' + hour + ':' + minute + ':' + second;
}

function drawCommentContentWrapper(content, parentId) {
    var answer = php_vars.answer || ANSWER_DEFAULT;
    var privateWrite = (php_vars.privateWrite === 'true');
    var code = '<p class="commentContent">' + content + '</p>';
    if(!privateWrite) code += '<input type="button" class="commentSendButton commentList" onclick="replyComment(' + parentId + ')" id="commentReply" value="' + answer + '">';

    return code;
}

function drawComments(comments) {
    var commentsHTML = '';
    comments.forEach(function (comment, i){
        //console.log('---> ', comment);
        commentsHTML += '<h4 class="commentAlias">' + comment.alias + '</h4>';
        commentsHTML += '<h6 class="commentDate">' + formatCommentDate(comment.date) + '</h6>';
        commentsHTML += '<div class="commentContentWrapper">';
        commentsHTML += drawCommentContentWrapper(comment.content, i);
        if(comment.replies.length > 0) {
            commentsHTML += '<div class="commentReplyWrapper">';
            comment.replies.forEach(function (reply) {
                commentsHTML += '<h4 class="commentAlias">' + reply.alias + '</h4>';
                commentsHTML += '<h6 class="commentDate">' + formatCommentDate(reply.date) + '</h6>';
                commentsHTML += '<div class="commentContentWrapper">';
                commentsHTML += drawCommentContentWrapper(reply.content, i);
                commentsHTML += '</div>';
            });
            commentsHTML += '</div>';
        }
        commentsHTML += '</div>';
    });
    $('#commentWrapper').append(commentsHTML);
}

function resetFields() {
    $('#commentsAlias').removeClass('error');
    $('#commentsEmail').removeClass('error');
    $('#commentsReply').removeClass('error');
    $('.toastForm').removeClass('show');
    $('.toastForm').removeClass('msgOk');
    $('.toastForm').html('');
}

function sendComment() {
    //http://dcbq63a4hc6w3.cloudfront.net/bbva-components/comments?&thread=/sin-categorizar/nueva-noticia-notify/&project=itzngcoi
    // var url = '/bbva-components/comments?&thread=/sin-categorizar/nueva-noticia-notify/&project=itzngcoi';
    var ok = php_vars.ok || OK_DEFAULT;
    var error = php_vars.error || ERROR_DEFAULT;
    var author = php_vars.author || AUTHOR_DEFAULT;
    var url = 'http://dcbq63a4hc6w3.cloudfront.net/bbva-components/comments?&thread=/' + thread_comments + '/&project=itzngcoi';
    var params = {
        alias: $('#commentsAlias').val(),
        email: $('#commentsEmail').val(),
        content: $('#commentsReply').val()
    };

    if(parentId !== -1) {
        params.parentId = parentId;
    }

    if(author !== 'false' && author !== false) {
        params.postAuthor = author;
    }

    $.post(url, params, function(data) {
        showToast(ok, true);
    }).fail(function() {
        showToast(error);
    });
}

function showToast(err, isOk) {
    $('.toastForm').html(err);
    $('.toastForm').toggleClass('show');
    if(isOk) $('.toastForm').addClass('msgOk');
}

function checkForm() {

    var alias = $('#commentsAlias').val();
    var email = $('#commentsEmail').val();
    var content = $('#commentsReply').val();
    var error = false;
    var valError = php_vars.valError;
    var lopd = (php_vars.lopd === 'true');
    var lopdError = php_vars.lopdError || LOPD_ERROR_DEFAULT;
    var mailError = php_vars.mailError || MAIL_ERROR_DEFAULT;
    var captchaError = php_vars.errorCaptcha || CAPTCHA_ERROR_DEFAULT;
    var reMail = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;


    if(alias.trim() === '') {
        $('#commentsAlias').toggleClass('error');
        error = true;
    }
    if(email.trim() === '') {
        $('#commentsEmail').toggleClass('error');
        error = true;
    } else {
        if(!reMail.test(email)) {
            $('#commentsEmail').toggleClass('error');
            error = true;
            valError = mailError;
        }
    }
    if(content.trim() === '') {
        $('#commentsReply').toggleClass('error');
        error = true;
    }

    if(error) {
        showToast(valError);
        return;
    }

    if(lopd && !$('#acceptLOPD').prop('checked')) {
        showToast(lopdError);
        return;
    }

    sendComment();
}