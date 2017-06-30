@extends('home.layouts.app')

@section('content')
	<div class="mail-w3ls">
		<div class="container">
			<h2 class="tittle">Mail Us</h2>
			<div class="mail-grids">
				<div class="mail-top">
					<div class="col-md-4 mail-grid">
						<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
						<h5>Address</h5>
						<p>9th floor - Palace Building - 221B Walk of Fame - USA</p>
					</div>
					<div class="col-md-4 mail-grid">
						<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
						<h5>Phone</h5>
						<p>Telephone:  +1 800 603 6035</p>
					</div>
					<div class="col-md-4 mail-grid">
						<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
						<h5>E-mail</h5>
						<p>E-mail:<a href="mailto:example@mail.com"> example@mail.com</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="map-w3">

				</div>
				<div class="mail-bottom">
					<h4>Get In Touch With Us</h4>
					<form action="#" method="post">
						<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="text" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
						<textarea  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Submit" >
						<input type="reset" value="Clear" >

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

