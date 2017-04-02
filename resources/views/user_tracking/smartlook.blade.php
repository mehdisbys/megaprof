@if(env('APP_ENV') == 'prod')

    <script type="text/javascript">
        window.smartlook || (function (d) {
            var o = smartlook = function () {
                o.api.push(arguments)
            }, h = d.getElementsByTagName('head')[0];
            var c = d.createElement('script');
            o.api = new Array();
            c.async = true;
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.src = '//rec.smartlook.com/recorder.js';
            h.appendChild(c);
        })(document);
        smartlook('init', 'f319a0238c2514efc3273b601b15609ca6969577');
    </script>

@endif