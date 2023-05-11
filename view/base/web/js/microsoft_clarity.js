define(['jquery', 'underscore', 'mage/cookies'], function ($, _) {
    return function (config) {
        function get_browser() {
            let ua = navigator.userAgent, tem,
                M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
            if (/trident/i.test(M[1])) {
                tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
                return { name: 'IE', version: (tem[1] || '') };
            }
            if (M[1] === 'Chrome') {
                tem = ua.match(/\bOPR|Edge\/(\d+)/)
                if (tem != null) {
                    return { name: 'Opera', version: tem[1] };
                }
            }
            M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
            if ((tem = ua.match(/version\/(\d+)/i)) != null) {
                M.splice(1, 1, tem[1]);
            }

            return M.join(' ');
        }

        function get_os() {
            let userAgent = navigator.userAgent,
                platform = navigator.platform,
                macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
                windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
                iosPlatforms = ['iPhone', 'iPad', 'iPod'],
                os;

            if (macosPlatforms.indexOf(platform) !== -1) {
                os = 'Mac OS';
            } else if (iosPlatforms.indexOf(platform) !== -1) {
                os = 'iOS';
            } else if (windowsPlatforms.indexOf(platform) !== -1) {
                os = 'Windows';
            } else if (/Android/.test(userAgent)) {
                os = 'Android';
            } else if (/Linux/.test(platform)) {
                os = 'Linux';
            } else {
                os = userAgent;
            }

            return os;
        }

        function getClck() {
            let clck = $.mage.cookies.get('_clck');
            return clck ? clck.split('|', 1).join('') : '';
        }

        function sendAjax(clarity) {
            let itemName = 'current_clarity_user_id';
            let currentClarity = localStorage.getItem(itemName);
            currentClarity = JSON.parse(currentClarity) || {};

            if (clarity && (!currentClarity.hasOwnProperty(config.store_code) || currentClarity['store_code'] != clarity)) {
                let params = {
                    'clarity_user_id': clarity,
                    'browser': get_browser(),
                    'os': get_os(),
                    'store_id': config.store_id
                }
                $.ajax({
                    url: config.ajaxUrl,
                    type: 'post',
                    data: params,
                    success: function (res) {
                        var object = {};
                        object[config.store_code] = res.result;
                        currentClarity = $.extend(currentClarity, object);
                        localStorage.setItem(itemName, JSON.stringify(currentClarity));
                    }
                })
            }
        }

        $(document).ready(function () {
            setTimeout(function () {
                let clck = getClck();
                if (!clck || window.clarity == undefined) {
                    return;
                }
                sendAjax(clck);
            }, 5000);
        })
    }
})