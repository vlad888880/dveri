<script src="{{ asset('resources/js/jquery-3.4.1.js') }}"></script>
<script>
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD (Register as an anonymous module)
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// Node/CommonJS
		module.exports = factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (arguments.length > 1 && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setMilliseconds(t.getMilliseconds() + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {},
			// To prevent the for loop in the first place assign an empty array
			// in case there are no cookies at all. Also prevents odd result when
			// calling $.cookie().
			cookies = document.cookie ? document.cookie.split('; ') : [],
			i = 0,
			l = cookies.length;

		for (; i < l; i++) {
			var parts = cookies[i].split('='),
				name = decode(parts.shift()),
				cookie = parts.join('=');

			if (key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));
</script>
<script src="{{ asset('resources/js/welcome-section.js') }}"></script>
<script src="{{ asset('resources/js/jquery.easing.1.3.min.js') }}"></script>
<script src="{{ asset('resources/js/jquery.ellipsis.min.js') }}"></script>
<script src="{{ asset('resources/js/jquery.formstyler.min.js') }}"></script>
<script src="{{ asset('resources/js/jquery.inview.min.js') }}"></script>
<script src="{{ asset('resources/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('resources/js/jquery.fsscroll.js') }}"></script>
<script src="{{ asset('resources/js/jquery.touchSwipe.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.8/lottie.min.js"></script>
<script src="{{ asset('resources/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('resources/js/category-carousel-section.js') }}"></script>
<script src="{{ asset('resources/js/header.js') }}"></script>
<script src="{{ asset('resources/js/index.js') }}"></script>
<script src="{{ asset('resources/js/navigation.js') }}"></script>
<script src="{{ asset('resources/js/skip-link-focus-fix.js') }}"></script>
<script src="{{ asset('resources/js/our-doors-section.js') }}"></script>
<script src="{{ asset('resources/js/info-section.js') }}"></script>
<script src="{{ asset('resources/js/product.js') }}"></script>
<script src="{{ asset('resources/js/catalog-section.js') }}"></script>
<script src="{{ asset('resources/js/skip-link-focus-fix.js') }}"></script>
<script src="{{ asset('resources/js/cart.js') }}"></script>
<script src="{{ asset('resources/js/article-section.js') }}"></script>
<!-- <script src="{{ asset('resources/js/services.js') }}"></script> -->
<!-- <script src="{{ asset('resources/js/stocks-section.js') }}"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('resources/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/js/slick.min.js') }}"></script>
<!-- <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script> -->


