<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name') }} - @yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<script type="module" src="@yield('js')"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
	<header>
		<h1>
			<picture class="logo"><img src="{{ asset('img/SVG/logo.svg') }}" alt=""></picture>
		</h1>
	</header>
	<main>

		@if(session('success'))
		<div class="alerte alerte_succes">
			<p>{{ session('success') }}</p>
			<button data-js-action="fermer">x</button>
		</div>
		@endif

		@if(session('error'))
		<div class="alerte alerte_erreur">
			<p>{{ session('error') }}</p>
			<button data-js-action="fermer">x</button>
		</div>
		@endif
		@yield('content')
	</main>
	@auth
	<footer>
		@if(isset($addButton))
		<div>
			<a href="{{ route('cellar.create') }}" class="btn-add">✚ {{$addButton}}</a>
		</div>
		@endif
		@if(isset($addBottle))
		<div>
			<a href="{{ route('search.index') }}" class="btn-add">✚ {{$addBottle}}</a>
		</div>
		@endif
		<!-- Ajouter un bouton "+ Bouteille" seulement sur la route 'cellar.showBottles' -->
		@if(Route::currentRouteName() == 'cellar.showBottles')
        <div>
            <a href="{{ route('search.index', ['source' => 'cellier', 'cellar_id' => $cellar->id]) }}" class="btn-add">+ Bouteille</a>
        </div>
		@endif
    @if(Route::currentRouteName() == 'purchase.index')
        <!-- Si on est sur la page des achats -->
        <div>
            <a href="{{ route('search.index', ['source' => 'listeAchat']) }}" class="btn-add">+ Bouteille</a>
        </div>
		@endif
    @if(Route::currentRouteName() == 'user.showBottles')
        <div>
            <a href="{{ route('search.index', ['source' => 'mesBouteilles']) }}" class="btn-add">+ Bouteille</a>
        </div>
    @endif
		<nav class="nav-menu">
			<a href="{{ route('cellar.index') }}" class="nav-menu__item">
				<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
					<g id="Barrels_storage">
						<path
							d="M290.3185,457.64a13.3064,13.3064,0,0,0,12.294,8.4253H408.3773a13.3026,13.3026,0,0,0,12.2791-8.3847,203.8927,203.8927,0,0,0,7.9809-23.64H282.4252A208.5058,208.5058,0,0,0,290.3185,457.64Z" />
						<path
							d="M434.4116,327.4217H276.6488a258.2621,258.2621,0,0,0,0,80.4119H434.4116a258.0921,258.0921,0,0,0,0-80.4119Z" />
						<path
							d="M290.4061,277.5311a203.9026,203.9026,0,0,0-7.9809,23.6406H428.6373a208.6815,208.6815,0,0,0-7.8933-23.6011,13.3059,13.3059,0,0,0-12.294-8.4232H302.6852A13.3015,13.3015,0,0,0,290.4061,277.5311Z" />
						<path
							d="M91.256,457.64a13.3064,13.3064,0,0,0,12.294,8.4253H209.3148a13.3026,13.3026,0,0,0,12.2791-8.3847,203.8927,203.8927,0,0,0,7.9809-23.64H83.3627A208.5058,208.5058,0,0,0,91.256,457.64Z" />
						<path
							d="M77.5863,327.4217a258.2621,258.2621,0,0,0,0,80.4119H235.3491A260.5156,260.5156,0,0,0,238.5,367.5849a260.2437,260.2437,0,0,0-3.1509-40.1632Z" />
						<path
							d="M221.6815,277.5706a13.3059,13.3059,0,0,0-12.294-8.4232H103.6227a13.3015,13.3015,0,0,0-12.2791,8.3837,203.9026,203.9026,0,0,0-7.9809,23.6406H229.5748A208.6815,208.6815,0,0,0,221.6815,277.5706Z" />
						<path
							d="M321.1251,234.4679a203.874,203.874,0,0,0,7.981-23.64H182.8939a208.59,208.59,0,0,0,7.8934,23.6,13.3069,13.3069,0,0,0,12.294,8.4243H308.8461A13.3025,13.3025,0,0,0,321.1251,234.4679Z" />
						<path
							d="M334.88,184.6211a258.0846,258.0846,0,0,0,0-80.412H177.1176a258.2628,258.2628,0,0,0,0,80.412Z" />
						<path
							d="M321.2127,54.3591a13.3054,13.3054,0,0,0-12.294-8.4243H203.1539a13.3025,13.3025,0,0,0-12.279,8.3847,203.8036,203.8036,0,0,0-7.981,23.64H329.1061A208.59,208.59,0,0,0,321.2127,54.3591Z" />
					</g>
				</svg>Celliers</a>
			<a href="{{ route('user.showBottles') }}" class="nav-menu__item">
				<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
					<g id="Wine_bottle">
						<path
							d="M291,169.6538V111.623H221v57.9942h-.0024C190.0952,183.6157,168.5,215.5859,168.5,252.7837H256V396H168.5v56.8774A13.1224,13.1224,0,0,0,181.6226,466H330.3774A13.1227,13.1227,0,0,0,343.5,452.8774V252.7837C343.5,215.5913,321.894,183.6558,291,169.6538Z"
							fill="#fefef2" />
						<path
							d="M291,59.0991A13.0991,13.0991,0,0,0,277.9009,46H234.0991A13.0989,13.0989,0,0,0,221,59.0991V85.373h70Z"
							fill="#fefef2" />
					</g>
				</svg>Bouteilles
			</a>
			<a href="{{ route('search.index') }}" class="nav-menu__item">
				<svg enable-background="new 0 0 32 32" id="Glyph" version="1.1" viewBox="0 0 32 32" xml:space="preserve"
					xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path
						d="M27.414,24.586l-5.077-5.077C23.386,17.928,24,16.035,24,14c0-5.514-4.486-10-10-10S4,8.486,4,14  s4.486,10,10,10c2.035,0,3.928-0.614,5.509-1.663l5.077,5.077c0.78,0.781,2.048,0.781,2.828,0  C28.195,26.633,28.195,25.367,27.414,24.586z M7,14c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7S7,17.86,7,14z"
						id="XMLID_223_" />
				</svg>Recherche
			</a>
			<a href="{{route('purchase.index')}}" class="nav-menu__item">
				<svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M560 192l-101.6 .002l-93.11-179.1c-6.062-11.72-20.61-16.37-32.36-10.22c-11.78 6.094-16.34 20.59-10.22 32.34l81.61 156.9H171.7l81.61-156.9C259.4 23.32 254.9 8.822 243.1 2.728C231.3-3.397 216.8 1.228 210.7 12.95l-93.11 179.1L16 192c-8.836 0-16 7.164-16 15.1v32c0 8.836 7.164 15.1 16 15.1h23.11l45.75 205.9C91.37 491.2 117.3 512 147.3 512h281.3c29.1 0 55.97-20.83 62.48-50.12l45.75-205.9H560c8.838 0 16-7.164 16-15.1v-32C576 199.2 568.8 192 560 192zM192 432c0 8.834-7.166 15.1-16 15.1c-8.832 0-16-7.166-16-15.1V304c0-8.834 7.168-15.1 16-15.1c8.834 0 16 7.166 16 15.1V432zM304 432c0 8.834-7.166 15.1-16 15.1c-8.832 0-16-7.165-16-15.1V304c0-8.834 7.168-15.1 16-15.1c8.834 0 16 7.166 16 15.1V432zM416 432c0 8.834-7.166 15.1-16 15.1c-8.832 0-16-7.166-16-15.1V304c0-8.834 7.168-15.1 16-15.1c8.834 0 16 7.166 16 15.1V432z" />
				</svg>Liste</a>
			<a href="{{route('user.profile')}}" class="nav-menu__item">
				<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					<title>Icone avatar</title>
					<circle cx="12" cy="8" fill="#fefef2" r="4" />
					<path d="M20,19v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V19a6,6,0,0,1,6-6h4A6,6,0,0,1,20,19Z"
						fill="#fefef2" />
				</svg>Profile</a>
		</nav>
	</footer>
	@endauth
</body>