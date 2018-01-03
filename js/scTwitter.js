'use strict';

jQuery(document).ready(function() {
    var $ = jQuery;
    var nTweets = php_vars.nTweets;
    var userId = php_vars.userId;
    /*
    // http://d1xkg658gp8s5n.cloudfront.net/bbva-components/twitter/?project=is8lyryw&baseUri=statuses/user_timeline&count=3&user_id=14524863
    var url = '/bbva-components/twitter/';

    var params = {
        project: 'is8lyryw',
        baseUri: 'statuses/user_timeline',
        count: nTweets,
        user_id: userId
    };

    $.get(url, params, function(data) {
        if(data){
            var tweets = '';
            var img = '';
            var name = '';
            var screenName = '';
            var text = '';
            var retweeted = false;
            var tweetData = {};
            var entities = [];
            var likes = 0;
            var rts = 0;
            var createdAt = null;
            var tweetId = '';

            for(var tweet in data) {
                retweeted = data[tweet].retweeted;
                if(!retweeted) {
                    tweetData = data[tweet];
                } else {
                    tweetData = data[tweet].retweeted_status;
                }

                img = tweetData.user.profile_image_url;
                name = tweetData.user.name;
                screenName = tweetData.user.screen_name;
                entities = data[tweet].entities;
                text = formatText(data[tweet].text, entities);
                likes = data[tweet].favorite_count;
                rts = data[tweet].retweet_count;
                createdAt = new Date(data[tweet].created_at);
                tweetId = data[tweet].id_str;
                tweets += '<div class="tweetContainer"><div class="tweetData">';
                tweets += '<div class="wrapperImg"><img src="' + img + '" class="scTwitterAvatar"></div>';
                tweets += '<div class="wrapperData">';
                tweets += formatHeader(name, screenName, createdAt);
                tweets += '<p class="tweetBody">' + text + '</p>';
                tweets += '</div></div>';
                tweets += '<div class="tweetInfo"><span><a href="https://twitter.com/intent/like?tweet_id=' + tweetId + '" target="_blank"><i class="glyphicon glyphicon-heart"></i></a>' + likes + '</span>';
                tweets += '<span><a href="https://twitter.com/intent/retweet?tweet_id=' + tweetId + '" target="_blank"><i class="glyphicon glyphicon-retweet"></i></a>' + rts + '</span></div>';
                tweets += '</div>';
            }
            tweets += '</div>';
            $('#tweetsContainer').append(tweets);
        }
    });
*/
    var result = {"code":200,"data":[{"created_at":"Thu May 04 10:54:39 +0000 2017","id":860085256543756300,"id_str":"860085256543756289","text":"¿Qué gastos se pueden deducir en la Declaración de la Renta como autónomo? https://t.co/3d3TMfbJSG #Renta2016","truncated":false,"entities":{"hashtags":[{"text":"Renta2016","indices":[99,109]}],"symbols":[],"user_mentions":[],"urls":[{"url":"https://t.co/3d3TMfbJSG","expanded_url":"http://bbva.info/2qal0Gs","display_url":"bbva.info/2qal0Gs","indices":[75,98]}]},"source":"<a href=\"http://twitter.com\" rel=\"nofollow\">Twitter Web Client</a>","in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":14524863,"id_str":"14524863","name":"BBVAEduFin","screen_name":"bbvaedufin","location":"Madrid","description":"BBVA promueve la importancia de los conocimientos y habilidades financieras como una cuestión fundamental que tiene un impacto en el bienestar de las personas","url":"https://t.co/gz5pd5SnEn","entities":{"url":{"urls":[{"url":"https://t.co/gz5pd5SnEn","expanded_url":"https://www.bbvaedufin.com/","display_url":"bbvaedufin.com","indices":[0,23]}]},"description":{"urls":[]}},"protected":false,"followers_count":10628,"friends_count":1588,"listed_count":590,"created_at":"Fri Apr 25 10:37:51 +0000 2008","favourites_count":355,"utc_offset":7200,"time_zone":"Madrid","geo_enabled":false,"verified":false,"statuses_count":18446,"lang":"es","contributors_enabled":false,"is_translator":false,"is_translation_enabled":false,"profile_background_color":"DFF1FB","profile_background_image_url":"http://pbs.twimg.com/profile_background_images/847263586/ae992678f1e13d2c0fbec711d6bb606b.png","profile_background_image_url_https":"https://pbs.twimg.com/profile_background_images/847263586/ae992678f1e13d2c0fbec711d6bb606b.png","profile_background_tile":false,"profile_image_url":"http://pbs.twimg.com/profile_images/798942152281690112/-aI0EV5b_normal.jpg","profile_image_url_https":"https://pbs.twimg.com/profile_images/798942152281690112/-aI0EV5b_normal.jpg","profile_banner_url":"https://pbs.twimg.com/profile_banners/14524863/1482486111","profile_link_color":"0066CC","profile_sidebar_border_color":"FFFFFF","profile_sidebar_fill_color":"A9D6EF","profile_text_color":"000000","profile_use_background_image":true,"has_extended_profile":false,"default_profile":false,"default_profile_image":false,"following":false,"follow_request_sent":false,"notifications":false,"translator_type":"none"},"geo":null,"coordinates":null,"place":null,"contributors":null,"is_quote_status":false,"retweet_count":0,"favorite_count":0,"favorited":false,"retweeted":false,"possibly_sensitive":false,"lang":"es"},{"created_at":"Thu May 04 08:35:06 +0000 2017","id":860050135937626100,"id_str":"860050135937626112","text":"Estos son algunos errores financieros que debe evitar porque pueden convertirse en deudas abismales https://t.co/coo5jRb7B4 @ELTIEMPO","truncated":false,"entities":{"hashtags":[],"symbols":[],"user_mentions":[{"screen_name":"ELTIEMPO","name":"EL TIEMPO","id":9633802,"id_str":"9633802","indices":[124,133]}],"urls":[{"url":"https://t.co/coo5jRb7B4","expanded_url":"http://bbva.info/2pI3Xy3","display_url":"bbva.info/2pI3Xy3","indices":[100,123]}]},"source":"<a href=\"http://www.hootsuite.com\" rel=\"nofollow\">Hootsuite</a>","in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":14524863,"id_str":"14524863","name":"BBVAEduFin","screen_name":"bbvaedufin","location":"Madrid","description":"BBVA promueve la importancia de los conocimientos y habilidades financieras como una cuestión fundamental que tiene un impacto en el bienestar de las personas","url":"https://t.co/gz5pd5SnEn","entities":{"url":{"urls":[{"url":"https://t.co/gz5pd5SnEn","expanded_url":"https://www.bbvaedufin.com/","display_url":"bbvaedufin.com","indices":[0,23]}]},"description":{"urls":[]}},"protected":false,"followers_count":10628,"friends_count":1588,"listed_count":590,"created_at":"Fri Apr 25 10:37:51 +0000 2008","favourites_count":355,"utc_offset":7200,"time_zone":"Madrid","geo_enabled":false,"verified":false,"statuses_count":18446,"lang":"es","contributors_enabled":false,"is_translator":false,"is_translation_enabled":false,"profile_background_color":"DFF1FB","profile_background_image_url":"http://pbs.twimg.com/profile_background_images/847263586/ae992678f1e13d2c0fbec711d6bb606b.png","profile_background_image_url_https":"https://pbs.twimg.com/profile_background_images/847263586/ae992678f1e13d2c0fbec711d6bb606b.png","profile_background_tile":false,"profile_image_url":"http://pbs.twimg.com/profile_images/798942152281690112/-aI0EV5b_normal.jpg","profile_image_url_https":"https://pbs.twimg.com/profile_images/798942152281690112/-aI0EV5b_normal.jpg","profile_banner_url":"https://pbs.twimg.com/profile_banners/14524863/1482486111","profile_link_color":"0066CC","profile_sidebar_border_color":"FFFFFF","profile_sidebar_fill_color":"A9D6EF","profile_text_color":"000000","profile_use_background_image":true,"has_extended_profile":false,"default_profile":false,"default_profile_image":false,"following":false,"follow_request_sent":false,"notifications":false,"translator_type":"none"},"geo":null,"coordinates":null,"place":null,"contributors":null,"is_quote_status":false,"retweet_count":1,"favorite_count":0,"favorited":false,"retweeted":false,"possibly_sensitive":false,"lang":"es"},{"created_at":"Wed May 03 21:30:20 +0000 2017","id":859882844180688900,"id_str":"859882844180688896","text":"Do you know our Advisory Council? If you want to know them, access your card in https://t.co/UNA5VlMsb8 #finlit","truncated":false,"entities":{"hashtags":[{"text":"finlit","indices":[104,111]}],"symbols":[],"user_mentions":[],"urls":[{"url":"https://t.co/UNA5VlMsb8","expanded_url":"http://bbva.info/2pwTBjP","display_url":"bbva.info/2pwTBjP","indices":[80,103]}]},"source":"<a href=\"http://www.hootsuite.com\" rel=\"nofollow\">Hootsuite</a>","in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":14524863,"id_str":"14524863","name":"BBVAEduFin","screen_name":"bbvaedufin","location":"Madrid","description":"BBVA promueve la importancia de los conocimientos y habilidades financieras como una cuestión fundamental que tiene un impacto en el bienestar de las personas","url":"https://t.co/gz5pd5SnEn","entities":{"url":{"urls":[{"url":"https://t.co/gz5pd5SnEn","expanded_url":"https://www.bbvaedufin.com/","display_url":"bbvaedufin.com","indices":[0,23]}]},"description":{"urls":[]}},"protected":false,"followers_count":10628,"friends_count":1588,"listed_count":590,"created_at":"Fri Apr 25 10:37:51 +0000 2008","favourites_count":355,"utc_offset":7200,"time_zone":"Madrid","geo_enabled":false,"verified":false,"statuses_count":18446,"lang":"es","contributors_enabled":false,"is_translator":false,"is_translation_enabled":false,"profile_background_color":"DFF1FB","profile_background_image_url":"http://pbs.twimg.com/profile_background_images/847263586/ae992678f1e13d2c0fbec711d6bb606b.png","profile_background_image_url_https":"https://pbs.twimg.com/profile_background_images/847263586/ae992678f1e13d2c0fbec711d6bb606b.png","profile_background_tile":false,"profile_image_url":"http://pbs.twimg.com/profile_images/798942152281690112/-aI0EV5b_normal.jpg","profile_image_url_https":"https://pbs.twimg.com/profile_images/798942152281690112/-aI0EV5b_normal.jpg","profile_banner_url":"https://pbs.twimg.com/profile_banners/14524863/1482486111","profile_link_color":"0066CC","profile_sidebar_border_color":"FFFFFF","profile_sidebar_fill_color":"A9D6EF","profile_text_color":"000000","profile_use_background_image":true,"has_extended_profile":false,"default_profile":false,"default_profile_image":false,"following":false,"follow_request_sent":false,"notifications":false,"translator_type":"none"},"geo":null,"coordinates":null,"place":null,"contributors":null,"is_quote_status":false,"retweet_count":0,"favorite_count":0,"favorited":false,"retweeted":false,"possibly_sensitive":false,"lang":"en"}]}
    var data = result.data;
    if(data){
        var tweets = '';
        var img = '';
        var name = '';
        var screenName = '';
        var text = '';
        var retweeted = false;
        var tweetData = {};
        var entities = [];
        var likes = 0;
        var rts = 0;
        var createdAt = null;
        var tweetId = '';

        for(var tweet in data) {
            retweeted = data[tweet].retweeted;
            if(!retweeted) {
                tweetData = data[tweet];
            } else {
                tweetData = data[tweet].retweeted_status;
            }

            img = tweetData.user.profile_image_url;
            name = tweetData.user.name;
            screenName = tweetData.user.screen_name;
            entities = data[tweet].entities;
            text = formatText(data[tweet].text, entities);
            likes = data[tweet].favorite_count;
            rts = data[tweet].retweet_count;
            createdAt = new Date(data[tweet].created_at);
            tweetId = data[tweet].id_str;
            tweets += '<div class="tweetContainer"><div class="tweetData">';
            tweets += '<div class="wrapperImg"><img src="' + img + '" class="scTwitterAvatar"></div>';
            tweets += '<div class="wrapperData">';
            tweets += formatHeader(name, screenName, createdAt);
            tweets += '<p class="tweetBody">' + text + '</p>';
            tweets += '</div></div>';
            tweets += '<div class="tweetInfo"><span><a href="https://twitter.com/intent/like?tweet_id=' + tweetId + '" target="_blank"><i class="glyphicon glyphicon-heart"></i></a>' + likes + '</span>';
            tweets += '<span><a href="https://twitter.com/intent/retweet?tweet_id=' + tweetId + '" target="_blank"><i class="glyphicon glyphicon-retweet"></i></a>' + rts + '</span></div>';
            tweets += '</div>';
        }
        tweets += '</div>';
        $('#tweetsContainer').append(tweets);
    }
});

function formatHeader(name, screenName, createdAt) {
    var htmlCode = '<div class="title"><span><a href="https://twitter.com/"' + screenName + '>' + name + '</a>';
    htmlCode += '<label class="screenName">@' + screenName + '</label>';
    htmlCode += '</span><span class="tweetDate">';
    htmlCode += formatDate(createdAt);
    htmlCode += '</span></div>';
    return htmlCode;
}

function formatDate(date) {
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    return date.getDay() + ' ' + months[date.getMonth()].toLowerCase();
}

function formatText(text, entities) {
    let urls = entities.urls;
    let mentions = entities.user_mentions;
    let hashtags = entities.hashtags;
    let link = '';
    if(urls.length > 0) {
        for(let url in urls) {
            link = '<a href="' + urls[url].expanded_url + '" target="_blank">' + urls[url].display_url + '</a>'
            text = text.replace(urls[url].url, link);
        }
    }
    if(mentions.length > 0) {
        for(let mention in mentions) {
            link = '<a href="https://twitter.com/' + mentions[mention].screen_name + '" target="_blank">@' + mentions[mention].screen_name + '</a>'
            text = text.replace('@'+mentions[mention].screen_name, link);
        }
    }
    if(hashtags.length > 0) {
        for(let ht in hashtags) {
            link = '<a href="https://twitter.com/hashtag/' + hashtags[ht].text + '?src=hash" target="_blank">#' + hashtags[ht].text + '</a>'
            text = text.replace('#'+hashtags[ht].text, link);
        }
    }
    return text;
}