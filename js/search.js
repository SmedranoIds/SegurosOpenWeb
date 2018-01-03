'use strict';

(function($) {

    var Search = {

        config: {
            size:       10,
            perpage:    10,
            items:      [],
            term:       '#term',
            tpl:        '#openweb-item',
            lang:       'lang',
            query:      'q',
            title:      'strong.openweb-title-item',
            href:       'a.openweb-url-item',
            body:       'p.openweb-excerpt-item',
            results:    '#openweb-results',
            count:      '#openweb-results-count',
            range:      '#openweb-results-range',
            pagination: '#openweb-pagination'
        },

        getParameterByName: function(name, url) {
            url = ! url ? window.location.href : url;

            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
            var results = regex.exec(url);

            if (! results) {
                return null;
            }

            if (!results[2]) {
                return '';
            }

            return decodeURIComponent(results[2].replace(/\+/g, " "));
        },

        execute: function() {
            var term = Search.getParameterByName(Search.config.query);

            if (! term) {
                return;
            }

            $(Search.config.term).html('"'+term+'"');

            var lang = $('html').attr(Search.config.lang);
            var page = parseInt(Search.getParameterByName('pag')) || 1;
            var start = page === 1 ? 0 : (page - 1) * Search.config.size;
            var api = new BbvaComponent();

            api.apiCall('search', {q: '*'+term+'*', fq: "(and(and content_language:'"+lang+"'))", project: api.getProject(), start: start, size: Search.config.size}, 'get', null, function(err, d) {
                if (null === err) {
                    var total = d.data.hits.found;

                    if (total > 0) {
                        $('#openweb-count').removeClass('hidden');
                        var tpl = $(Search.config.tpl).html();

                        for (var x = 0; x < d.data.hits.hit.length; ++x) {
                            var item = d.data.hits.hit[x].fields;
                            var $tpl = $(tpl);

                            console.log($tpl.find(Search.config.href).attr('href'));

                            $tpl.find(Search.config.href).attr('href', window.location.protocol+'//'+window.location.hostname+item.resourcename);
                            $tpl.find(Search.config.title).html(item.title);
                            $tpl.find(Search.config.body).html(item.description);
                            $(Search.config.results).append($tpl);
                        }

                        Search.generatePagination(total, page, term);
                        Search.generateShowResults(total, page);
                    } else {
                        $('#openweb-non-results').append('<strong>"'+term+'"</strong>').removeClass('hidden');
                    }
                }
            });
        },

        range: function(current, pages) {
            var half = Math.floor(Search.config.size / 2);
            var limit = pages - Search.config.size;
            var start = current > half ? Math.max(Math.min(current - half, limit), 1) : 1;
            var end = current > half ? Math.min(current + half + (Search.config.size % 2), pages) : Math.min(Search.config.size, pages);

            return {
                start: start,
                end: end
            }
        },

        generatePagination: function(total, current, term) {
            var pages = Math.ceil(total/Search.config.size);
            var items = [];
            var range = Search.range(current, pages);
            var x = range.start;
            var url = window.location.protocol+'//'+window.location.hostname+location.pathname+'?q='+term+'&pag=';

            items.push(current === 1 ? '' : '<span><a href="'+url+'1">&laquo;</a></span><span><a href="'+url+(current - 1 === 0 ? 1 : current - 1)+'">&lt;</a></span>');

            for (;x <= range.end; ++x) {
                items.push((current === x ? (current === pages ? '<span class="search-active next">'+x+'</span>' : '<span class="search-active">'+x+'</span>') : '<span><a href="'+url+x+'">'+x+'</a></span>'));
            }

            items.push((current === pages ? '' : '<span><a href="'+url+(current +1)+'">&gt;</a></span><span class="next"><a href="'+url+pages+'">&raquo;</a></span>'));

            $(Search.config.pagination).append(items.join(''));
        },

        generateShowResults: function(total, current) {
            var x = (current - 1) * Search.config.perpage + 1 === 0 ? 1 : (current - 1) * Search.config.perpage + 1;

            var y = x + Search.config.perpage - 1;

            if (y < Search.config.perpage) {
                y = Search.config.perpage;
            } else if (y > total) {
                y = total;
            }

            $(Search.config.count).append(total);
            $(Search.config.range).append(x+' - '+y);
        }
    };

    $(document).ready(function() {
        Search.execute();
    });
})(jQuery);
