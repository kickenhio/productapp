<div class="row" ng-bind-html-unsafe="ajaxData">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" ng-submit="saveAttribute(edition)">
					<input type="hidden" name="token" ng-model="attribute.token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" ng-model="attribute.id" value="@{{ attribute.id }}">
					<input id="product_id" type="hidden" name="product_id" ng-model="attribute.product_id" value="@{{ product.id }}">
					<input type="hidden" name="currency" ng-model="attribute.currency" value="@{{ product.currency }}">

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Name</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="name" ng-model="attribute.name">
							<span ng-show="form_error.name" class="help-block">
								<strong>@{{form_error.name}}</strong>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Symbol</label>
						<div class="col-md-6">
							<input id="slug" type="text" class="form-control" name="slug" ng-model="attribute.slug">
							<span ng-show="form_error.slug" class="help-block">
								<strong>@{{form_error.slug}}</strong>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Currency</label>
						<div class="col-md-6">
							<input id="currency" readonly type="text" class="form-control" name="currency" ng-model="product.currency">
						</div>
					</div>

					<div class="form-group">
                        <label for="email" class="col-md-4 control-label">Price</label>
                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" ng-model="attribute.price">
                            <span ng-show="form_error.price" class="help-block">
                                <strong>@{{form_error.price}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i> Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
