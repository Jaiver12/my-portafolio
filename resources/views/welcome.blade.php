<!DOCTYPE HTML>
<html>
	<head>
		<title>Jaiver Ramos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="#" class="image avatar"><img src="{{ asset('images/jaiver.jpg') }}" alt="" /></a>
					<h1><strong>Bienvenido a mi protafolio </strong>
                        
				</div>
			</header>

		<!-- Main -->
			<div id="main">

				<!-- One -->
					<section id="one">
						<header class="major">
							<h2>Hola soy Jaiver Ramos<br />
							programador web laravel Junior</h2>
						</header>
						<p>Soy Ingeniero en Informática, estoy en constante aprendisaje me considero un autodidacta y me gusta aportar soluciones reales</p>
						<!-- <ul class="actions">
							<li><a href="#" class="button">Learn More</a></li>
						</ul> -->
					</section>

				<!-- Two -->
					<section id="two">
						<h2>Proyectos</h2>
						<div class="row">

							@foreach ($portafolios as $item)
								<article class="col-6 col-12-xsmall">
									<a href="{{ $item->url }}" target="_blank" class="image fit thumb">
										<img src="{{ Storage::url($item->image) }}" alt="" />
									</a>
									<h3>{{ $item->name }}  </h3>
									<p>{{ $item->description }}</p>
								</article>
							@endforeach
							

						</div>

						<!-- <ul class="actions">
							<li><a href="#" class="button">Full Portfolio</a></li>
						</ul> -->
                        
					</section>

				<!-- Three -->
					<section id="three">
						<h2>Contacto</h2>
						
						<div class="row">
							<div class="col-8 col-12-small">

								<form method="post" action="{{ route('crear-mensaje') }}" class="formulario">
									@csrf
									<div class="row gtr-uniform gtr-50">
										<div class="col-6 col-12-xsmall"><input type="text" name="name" id="name" placeholder="Nombre" /></div>
										<div class="col-6 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Email" /></div>
										<div class="col-12"><textarea name="message" id="message" placeholder="Mensaje" rows="4"></textarea></div>
									</div>
									<br>
									<ul class="actions">
										<li><input type="submit" value="Enviar" /></li>
									</ul>
								</form>
							</div>
							<div class="col-4 col-12-small">
								<ul class="labeled-icons">
									
									<li>
										<h3 class="icon solid fa-mobile-alt"><span class="label">Telefono</span></h3>
										+57 304-385-0685
									</li>
									<li>
										<h3 class="icon solid fa-envelope"><span class="label">Email</span></h3>
										<a href="#">jaiver.ramos7942@gmail.com</a>
									</li>
								</ul>
							</div>
						</div>
					</section>

			<!-- Four -->

			</div>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="https://github.com/Jaiver12" target="_blank" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="https://www.linkedin.com/in/jaiver-ramos-9a7930219/" target="_blank" class="icon brands fa-linkedin"><span class="label">Linkedin</span></a></li>
						<li><a href="https://api.whatsapp.com/send?phone=573043850685&text=Hola%20Jaiver,%20quiero%20me%20quiero%20poner%20en%20conctacto%20contigo%20..." class="icon brands fa-whatsapp"><span class="label">Email</span></a></li>
					</ul>
					
				</div>
			</footer>

		<!-- Scripts -->
			<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.poptrox.min.js') }}"></script>
			<script src="{{ asset('assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('assets/js/util.js') }}"></script>
			<script src="{{ asset('assets/js/main.js') }}"></script>
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

			
			<script>
				$('.formulario').submit(function(e){
					e.preventDefault();

					var name = $('#name').val();
					var email = $('#email').val();
					var message = $('#message').val();
					var _token  = $('input[name=_token]').val();

					$.ajax({
						url: "{{ route('crear-mensaje') }}",
						type: "POST",
						data: {
							name: name,
							email: email, 
							message: message,
							_token: _token

						},
						success:function(res){
							if(res){
								$('.formulario')[0].reset();

								Swal.fire({
									position: 'top-end',
									icon: 'success',
									title: 'Mensaje enviado',
									showConfirmButton: false,
									timer: 2000
								})
							}
						}
					})

				});
			</script>

	</body>
</html>