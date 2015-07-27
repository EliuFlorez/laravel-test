<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<meta name="csrf-token" content="{{{ csrf_token() }}}">
<title>
	@section('title')
		Laravel
	@show
</title>

<!-- Style -->
<link rel="stylesheet" href="{{{ asset('css/bootstrap.min.css') }}}">
<link rel="stylesheet" href="{{{ asset('css/bootstrap-theme.min.css') }}}">
<link rel="stylesheet" href="{{{ asset('css/style.css') }}}">
<link rel="stylesheet" href="{{{ asset('css/datepicker.css') }}}">
<link rel="stylesheet" href="{{{ asset('select2/select2.css') }}}">

<!-- Javascripts -->
<script src="{{{ asset('js/jquery.min.js') }}}"></script>
<script src="{{{ asset('js/bootstrap.min.js') }}}"></script>
<script src="{{{ asset('js/bootstrap-datepicker.js') }}}"></script>
<script src="{{{ asset('select2/select2.min.js') }}}"></script>

<script type="text/javascript">
	
	var requests = 0;
	var urlBase = "{{url('/')}}";
	
	$(function() {
		$.ajaxSetup({
			headers: {'oauth-token': $('meta[name="csrf-token"]').attr('content')}
		});
	});
	
	// Avoid `console` errors in browsers that lack a console.
	(function() {
		var method;
		var noop = function(){};
		var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'];
		var length = methods.length;
		var console = (window.console = window.console || {});
		while (length--) {
			method = methods[length];
			if (!console[method]) {
				console[method] = noop;
			}
		}
	}());
	
	$(document).ready(function(){
		
		var log = logBind('>>');
		
		$('#datepicker1').datepicker();
		$('#datepicker2').datepicker();
		
		$('#selectAdd').select2({
			multiple: true,
			placeholder: 'Buscar...',
			minimumInputLength: 2,
			ajax: {
				url: urlBase+'/ajaxs/select',
				type: 'GET',
				dataType: 'JSON',
				data: function(term, page) {
					log('[Selects-Option]', term);
					return {
						query:term
					};
				},
				results: function(data, page) {
					log('[Selects-results]', data);
					return {results:data};
				}
			},
			formatResult: function (data) {
				log('[Selects-formatResult]', data);
				return "<div class='select2-user-result'>" + data.name + "</div>";
			},
			formatSelection: function (data) {
				log('[Selects-formatSelection]', data.name);
				return data.name;
			}
		}).on("select2-removing", function(e) {
			log("removing val="+ e.val+" choice="+ JSON.stringify(e.choice));
		}).on("select2-removed", function(e) {
			log("removed val="+e.val+" choice="+ JSON.stringify(e.choice));
		});
	});
	
	function logRequest(name){
		requests++;
		var currentdate = new Date();
		var datetime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
		console.log(datetime + ' >> Request ' + requests + ': ' + name);
	}	
	
	window.logBind = function(data){
		'use strict';
		var log;
		if(Function.prototype.bind){
			if(data){
				log = console.log.bind(console, data);
			} else {
				log = console.log.bind(console);
			}
		} else {
			log = function(){
				var args = Array.prototype.slice.call(arguments);
				if(data) args.unshift(data);
				console.log.apply(console, args);
			}
		}
		return log;
	};
</script>
</head>
<body>
	<!-- Menu -->
	@include('menu')
	<!-- End menu -->
	<div class="container wrap" style="padding:40px;">
		<!-- Notifications -->
		@include('notifications')
		<!-- End notifications -->
		
		<!-- Content -->
		@yield('content')
		<!-- End content -->
	</div>
</body>
</html>