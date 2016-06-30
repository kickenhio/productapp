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
				<div class="col-xs-12 col-md-4">
					<img src="http://placehold.it/350x150">
				</div>
				<div class="col-xs-12 col-md-8">
					<div class="caption">
					    <h2 class="group inner list-group-item-heading">
							<a href="#" ng-click="toggleExpanded(item)">@{{ item.name }}</a>
						</h2>
					    <div class="row">
							<div class="col-xs-12 col-md-6">
							    Price: <span class="badge">@{{ calcSum(item.price, item.attributes) }} @{{ item.currency }}</span>
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

				<div data-ng-if="item.expanded" class="item col-xs-12">
					<ul class="list-group">
						<li class="list-group-item" data-ng-repeat="option in item.attributes | orderBy:'name'">
							<span class="badge">@{{ option.price }} @{{ item.currency }}</span>
							<h5>@{{ option.name }}</h5>
						</li>
					</ul>
				</div>
			</div>
	    </div>
	</div>
    </div>
</div>
@endsection
