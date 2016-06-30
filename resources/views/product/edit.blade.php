<div class="row" ng-bind-html-unsafe="ajaxData">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form">
					<input type="hidden" name="token" ng-model="product.token" value="{{ csrf_token() }}">
					<input type="hidden" name="token" ng-model="product.id" value="@{{ product.id }}">

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Name</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="name" ng-model="product.name">
							<span ng-show="error.name" class="help-block">
								<strong>@{{error.name}}</strong>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Symbol</label>
						<div class="col-md-6">
							<input id="slug" type="text" class="form-control" name="slug" ng-model="product.slug">
							<span ng-show="error.slug" class="help-block">
								<strong>@{{error.slug}}</strong>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label for="ean" class="col-md-4 control-label">EAN</label>
						<div class="col-md-6">
							<input id="slug" type="text" class="form-control" name="ean" ng-model="product.ean">
							<span ng-show="error.ean" class="help-block">
								<strong>@{{error.ean}}</strong>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Currency</label>
						<div class="col-md-6">
							<input id="currency" type="text" class="form-control" name="currency" ng-model="product.currency">
							<span ng-show="error.currency" class="help-block">
								<strong>@{{error.currency}}</strong>
							</span>
						</div>
					</div>

					<div class="form-group">
                        <label for="email" class="col-md-4 control-label">Price</label>
                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" ng-model="product.price">
                            <span ng-show="error.price" class="help-block">
                                <strong>@{{error.price}}</strong>
                            </span>
                        </div>
                    </div>

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Attributes</label>
						<button class="btn btn-primary" ng-click="addAttribute(product)">add attribute</button>
						<div class="col-md-12">
							<div class="item col-xs-12" data-ng-repeat="option in product.attributes | orderBy:'name'">
								<div class="thumbnail">
									<div class="row">
										<div class="col-md-6">
											@{{ option.name }} - @{{ option.price }} @{{ product.currency }}
										</div>
										<div class="col-md-6">
											<button ng-click="deleteAttribute(option)" class="btn btn-danger">
												X
											</button>
											<button ng-click="editAttribute(option)" class="btn btn-success">
												Edit
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" ng-click="save()">
                                <i class="fa fa-btn fa-sign-in"></i> Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
