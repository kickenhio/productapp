<div class="row" ng-bind-html-unsafe="ajaxData">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" ng-submit="alertNg()">
					<input type="hidden" name="token" ng-model="newProduct.token" value="{{ csrf_token() }}">

					<div class="form-group">
                        <label for="email" class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" ng-model="newProduct.name">
                            <span ng-show="error.name" class="help-block">
                                <strong>@{{error.name}}</strong>
                            </span>
                        </div>
                    </div>

					<div class="form-group">
                        <label for="email" class="col-md-4 control-label">Price</label>
                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" ng-model="newProduct.price">
                            <span ng-show="error.price" class="help-block">
                                <strong>@{{error.price}}</strong>
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
