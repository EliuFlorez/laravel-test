<nav id="header" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{{ URL::to('/') }}}">Laravel</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-navbar-collapse">
		<ul class="nav navbar-nav navbar-avatar pull-right">
			<li class="{{{ (Request::is('clientes') ? 'active' : '') }}}"><a href="{{{ URL::to('clientes') }}}">Clientes</a></li>
			<li class="{{{ (Request::is('recibos') ? 'active' : '') }}}"><a href="{{{ URL::to('recibos') }}}">Recibos</a></li>
		</ul>
	</div>
</nav>