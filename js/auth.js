'use strict';

(function($) {

    var setCookie = function(name, value, options) {
        var cookie = name.trim();
        var d = new Date();

        if (typeof value === 'object') {
            value = JSON.stringify(value);
        } else {
            value = ('' + value).trim();
        }

        cookie = cookie + '=' + value + ';';

        if (!options) {
            d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
            cookie = cookie + 'expires=' + d.toUTCString();
        } else {
            for (var key in options) {
                var value = options[key];
                if (key === 'expires') {
                    d.setTime(d.getTime() + (value * 24 * 60 * 60 * 1000));
                    cookie = cookie + 'expires=' + d.toUTCString() + ';';
                } else {
                    cookie += (key + '=' + value + ';');
                }
            }
        }
        document.cookie = cookie;
    };

    var hasCookie = function(name) {
        return (new RegExp('(?:^|;\\s*)' + encodeURIComponent(name).replace(/[\-\.\+\*]/g, '\\$&') + '\\s*\\=')).test(document.cookie);
    };

    var validateRegister = function () {
        var chk = [];
        var info = '<div class="error-info"></div>';
        var rxe = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))){2,6}$/i);
        var rxp = new RegExp(/(?=^.{8,}$)(?=(.*\d){2})(?=(.*[A-Za-z]){2})(?!.*[ÑñÇç\\s])^.*/);

        $('#openweb-form-register input').each(function() {
            if ($(this).val().trim() === '') {
                $(this).addClass('error');
                $(this).after($(info).html($(this).attr('data-msg-err')));
                chk.push('error');
            } else {
                $(this).removeClass('error');
                $(this).siblings('.error-info').remove();
            }
        });

        if ($('#email').val().trim().length > 1 && ! rxe.test($('#email').val())) {
            $('#email').addClass('error').after($(info).html($('#email').attr('data-msg-err-format')));
            chk.push('error');
        }

        var pass = $('#password').val().trim();

        if (pass !== $('#repeat-password').val().trim()) {
            $('#password').addClass('error').after($(info).html($('#password').attr('data-msg-err-repeat')));
            chk.push('error');
        }

        if (pass.length > 1 && ! rxp.test(pass)) {
            $('#password').addClass('error').after($(info).html($('#password').attr('data-msg-err-format')));
            chk.push('error');
        }

        return chk.length === 0;
    };

    $(document).on('submit', '#openweb-form-login', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#signon-error-msg').fadeOut();
        var remember = $('#remembermeChk').is(':checked');
        var user = $('#userNameInput').val();
        var pass = $('#passwordInput').val();
        var url = window.location.protocol+'//'+window.location.hostname+'/auth/users/access' + (remember ? '?remember_me=true' : '');
        var options = {
            url: url,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            headers: {
                'authorization': 'Basic ' + window.btoa(user + ':' + pass)
            }
        };

        $.ajax(options)
            .done(function () {
                if (remember) {
                    setCookie('bbva_rememberme', true);
                }
                window.location.replace('/');
            })
            .fail(function (err) {
                $('#signon-error-msg').fadeIn();
            });
    });

    $(document).on('submit', '#openweb-form-register', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var core = $('script[data-bbva-project]');

        if (1 === core.length && validateRegister()) {
            var options = {
                method: 'POST',
                type: 'POST',
                url: window.location.protocol+'//'+window.location.hostname+'/bbva-components/authbbva/?project='+core.attr('data-bbva-project'),
                dataType : 'json',
                contentType : 'application/json'
            };
            var data= {
                'email': $('#email').val(),
                'username': $('#username').val(),
                'password': window.btoa($('#password').val()),
                'optional_data': {
                    'name': $('#name').val(),
                    'surname' : $('#surname').val()
                }
            };

            options.data = JSON.stringify(data);
            $.ajax(options)
                .done(function() {
                    $('errorArmadillo').hide();
                    $('#successArmadillo').show();
                    $('#openweb-form-register')[0].reset();
                    $('html, body').stop().animate({
                        scrollTop: ($('#successArmadillo').offset().top - 50)
                    }, 750);

                })
                .fail(function(err) {
                    var $errMsg = $('#errorArmadillo');
                    $errMsg.hide();
                    var atrib = err.status === 409 ? 'data-msg-error-conflict' : 'data-msg-error-default';
                    $errMsg.html($errMsg.children()).append(' '+$errMsg.attr(atrib));
                    $errMsg.show();
                    $('html, body').stop().animate({
                        scrollTop: ($errMsg.offset().top - 50)
                    }, 750);
                });
        }
    });

    $(document).ready(function() {
        if (hasCookie('CloudFront-Signature')) {
            BbvaComponent.getUserLogged(function(err, user) {
                if (user) {
                    console.log(user);
                    var name = ' ' + user.get('optional_data').name + ' ' + user.get('optional_data').surname;
                    var logout = $('#openweb-access-lg').attr('data-logout');

                    $('#openweb-access-lg').remove();
                    $('#openweb-access-mobile').remove();
                    $('#login-openweb-lg').append(name);
                    $('#login-openweb-lg').css({'display': 'block'});
                    $('#login-openweb-mobile').append(name);
                    $('#login-openweb-mobile').css({'display': 'inline'});
                    $('#register').html('<a href="#" id="openweb-user-logout">'+logout+'</a>');

                    $('#openweb-user-logout').on('click', function() {
                        user.logout(function() {
                            window.location.href = window.location.origin;
                        });
                    });
                }
            });
        }
    });
})(jQuery);