@extends('layouts.'.(Request::ajax() ? 'container' : 'request'))

@section('content')
<div class="container">
    <div id="products" class="row list-group">
	@if (Auth::check())
	    <button class="btn btn-primary pull-right" ng-click="create()">dodaj</button>
	@endif
	<div class="item col-xs-12" data-ng-repeat="item in list | orderBy:'name'">
	    <div class="thumbnail">
			<div class="row">
				<div class="col-xs-12">
					<div class="caption">
					    <h2 class="group inner list-group-item-heading">
							@{{ item.name }}
						</h2>
					    <div class="row">
							<div class="col-xs-12 col-md-6">
							    <p class="lead">@{{ item.price }} @{{ item.currency }}</p>
							</div>
						</div>
					</div>
					@if (Auth::check())
						<button ng-click="delete(item)" class="btn btn-danger">
							<i class="fa fa-btn fa-sign-in"></i> Delete
						</button>
						<button ng-click="edit(item)" class="btn btn-success">
							<i class="fa fa-btn fa-sign-in"></i> Edit
						</button>
					@endif
				</div>
			</div>
	    </div>
	</div>
    </div>
</div>
@endsection
