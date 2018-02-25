@extends('layouts.master')

@section('title')
	Laravel Shopping Cart
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<h1>Checkout</h1>
			<h4>Your Total: ${{ $total }}</h4>
			<form action="{{ route('checkout') }}" method="post" id="checkoutForm">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" id="address" class="form-control" required>
						</div>
					</div>
					<hr>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="cardName">Card Holder Name</label>
							<input type="text" id="cardName" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="cardNumber">Credit Cart Number</label>
							<input type="text" id="cardNumber" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="cardExpiryMonth">Expiration Month</label>
									<input type="text" id="cardExpiryMonth" class="form-control" required>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="cardExpiryYear">Expiration Year</label>
									<input type="text" id="cardExpiryYear" class="form-control" required>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="cardCVC">CVC</label>
							<input type="text" id="cardCVC" class="form-control" required>
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn bnt-success">Buy now</button>
			</form>
		</div>
	</div>
@endsection