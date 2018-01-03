'use strict';

(function ($) {
    var hexcolor = function (rgb) {
        var decimal = rgb.match(/^rgb\((\d+),\s+(\d+),\s+(\d+)\)$/);

        delete decimal[0];

        for (var x = 1; x <= 3; ++x) {
            decimal[x] = parseInt(decimal[x]).toString(16);
            decimal[x].length === 1 ? '0'+decimal[x] : decimal[x];
        }

        return '#'+ decimal.join('');
    };

    var lazyLoad = function($ele) {
        var url = '/wp-content/uploads/load';
        var pag = parseInt($ele.attr('data-page'));
        var next = pag + 9;
        var start = '<div class="bbva-cards card-stack"><div class="container"><div class="row"><section class="card-block">';
        var end = '</section></div></div></div>';
        var type = $ele.attr('data-type') !== '' ? $ele.attr('data-type')+'/' : '';

        $.get(url+'/'+type+$ele.attr('data-lazy')+'.json', function (d) {
            var nElements = d.length;
            var elements = d.slice(pag, (next > nElements ? nElements : next));

            if (elements.length) {
                var promises = [];
                elements.forEach(function(e) {
                    promises.push($.get(url+'/'+$ele.attr('data-post')+'/post_'+e+'.json'));
                });

                Promise.all(promises).then(function(posts) {
                    $.get('/wp-content/themes/openweb/js/tpl/item.html', function(tpl) {
                        var html = [];
                        for (var x = 0, c = posts.length; x<c; ++x) {
                            if (x === 0 || x % 3 === 0) {
                                html.push(start);
                            }

                            var item = tpl.replace(/\{\{url\}\}/g, posts[x].url);
                            item = item.replace(/\{\{thumbnail\}\}/g, (posts[x].image ? posts[x].image : ''));
                            item = item.replace(/\{\{title\}\}/g, posts[x].title);
                            item = item.replace(/\{\{category\}\}/g, posts[x].category);
                            item = item.replace(/\{\{excerpt\}\}/g, posts[x].excerpt);
                            item = item.replace(/\{\{more\}\}/g, $('.faux-link').html());
                            html.push(item);

                            if (x !== 0 && (x + 1) % 3 === 0) {
                                html.push(end);
                            }
                        }

                        if (x % 3 !== 0) {
                            html.push(end);
                        }

                        $ele.attr('data-page', pag + 9);
                        var more = $('#tpl-more').addClass('bbva-cards').prop('outerHTML');

                        if (nElements > next) {
                            html.push(more);
                        }

                        $('#tpl-more').remove();

                        $('#moreArticles').append(html.join(''));
                    });
                }).catch(function(er) {
                    console.log(er)
                });
            }
        });
    };

    $(document).ready(function() {
        $('#sidr-id-searchform #sidr-id-q').attr("placeholder", $('#search-container').attr('data-placeholder-mobile'));
        $('#searchform #q').attr("placeholder", $('#search-container').attr('data-placeholder'));

        $('.prettySocial').prettySocial();

        if ($('.pre-footer').length > 0) {
            var bg = $('.pre-footer').prev().css('backgroundColor');

            if ('transparent' === bg || 'rgba(0, 0, 0, 0)' === bg || '#ffffff' === hexcolor(bg)) {
                $('.pre-footer').removeClass('bg-white');
            }
        }

        menu.init();
    });

    $(document).on('click', '#lazyload', function(ev) {
        lazyLoad($(this));
        ev.preventDefault();
    });

    var menu = {
        subclassRx: '^ow-sub-menu-item-(\d+)$',

        init: function() {
            $('ul.sub-menu').each(function() {
                $(this).prev('a').append('<span class="bbva-coronita_chev link-submenu"></span>');
            });

            menu.bindMenu();
            menu.bindSubmenu();
            menu.bindCloseSubmenu();
        },

        bindMenu: function () {
            $(document).on('click', '#main-menu-id li a', function(e) {
                var $sub = $(this).parents('li').children('ul.sub-menu').children().clone();

                if ($sub.length > 0) {
                    $(this).parents('ul').find('a.active').removeClass('active');
                    $(this).addClass('active');

                    $('.secondary-nav li.menu-item').remove();
                    $('.secondary-nav li:not([class="search-wrapper"])').hide();

                    if ($('.secondary-nav li.ow-sub-menu-item-1').length > 0) {
                        $('.secondary-nav li.ow-sub-menu-item-1').remove();
                    }

                    $sub.each(function (i, e) {
                        $(e).addClass('ow-sub-menu-item-1');
                    });

                    $('#secondary-menu').prepend($sub);

                    e.preventDefault();
                    e.stopPropagation();
                }
            });
        },

        bindSubmenu: function () {
            $(document).on('click', '#secondary-menu li a', function(e) {
                var $sub = $(this).parents('li').children('ul.sub-menu').children().clone();

                if ($sub.length > 0) {
                    var $parent = $(this).parents('li');
                    var $sub = $parent.children('ul.sub-menu').children().clone().toArray();
                    var x = parseInt(menu.getNumberSubmenu($parent.attr('class'))) + 1;
                    $(this).parents('li').siblings('li:not([class="search-wrapper"])').hide();
                    $(this).parents('li').hide();
                    $sub.unshift($('<li><a href="#" class="icon-link"><span class="icon bbva-coronita_return"></span></a>'));
                    $.each($sub, function (i, e) {
                        $(e).addClass('ow-sub-menu-item-'+x);
                    });
                    $('#secondary-menu').prepend($sub);

                    e.preventDefault();
                }
            });
        },

        bindCloseSubmenu: function () {
            $(document).on('click', '.bbva-coronita_return', function(e) {
                var $parent = $(this).parents('li');
                var x = parseInt(menu.getNumberSubmenu($parent.attr('class')));
                $('.ow-sub-menu-item-'+x).remove();
                $('.ow-sub-menu-item-'+(x-1)).show();
                e.preventDefault();
            });
        },

        getNumberSubmenu: function (classnames) {
            var rx = /^ow-sub-menu-item-(\d+)$/;
            var rs = 0;
            $.each(classnames.split(' '), function (i, e) {
                if (rx.test(e)) {
                    rs = rx.exec(e)[1];
                }
            });

            return rs;
        }
    };
})(jQuery);

