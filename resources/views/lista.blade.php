@extends('layouts.'.(Request::ajax() ? 'container' : 'request'))

@section('content')
<div class="container">
    <div id="products" class="row list-group">
    <button class="btn btn-primary pull-right" ng-click="create()">dodaj</button>
	<div class="item col-xs-12" data-ng-repeat="item in list | orderBy:'name'">
	    <div class="thumbnail">
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<img src="http://placehold.it/350x150">
				</div>
				<div class="col-xs-12 col-md-8">
					<div class="caption">
					    <h2 class="group inner list-group-item-heading">
							<a href="/product/@{{ item.id }}">@{{ item.name }}</a>
						</h2>
					    <div class="row">
							<div class="col-xs-12 col-md-6">
							    <p class="lead">@{{ item.price }} @{{ item.currency }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
    </div>
</div>
@endsection
