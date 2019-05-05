
	<div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">@{{title}}</h1>
        
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
</div>
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-body " >
            <form ng-enter="actions.update()" data-parsley-validate id="form-insert-post" ng-dom="formData">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">	
							<h4>Tên bài viết</h4>	
							<input required  ng-model="getData.name"  class="form-control" type="" name="" placeholder="Tên bài viết">
							<div ng-repeat="err in data.errors.name" style="color: red; margin-top:5px;">
								@{{ err }}
							</div>
						</div>
						
						<div class="col-md-12">
							<h4>Mô tả</h4>
							<input required  ng-model="getData.description"  class="form-control" type="" name="" placeholder="Mô tả bài viết">
							<div ng-repeat="err in data.errors.description" style="color: red; margin-top:5px;">
								@{{ err }}
							</div>
						</div>

						<div class="col-md-12">	
							<h4>Nội dung</h4>

							<textarea required class="my-ckeditor" ng-model="getData.content">
								
							</textarea>
							<div ng-repeat="err in data.errors.content" style="color: red; margin-top:5px;">
								@{{ err }}
							</div>	
						</div>
						
						<div class="col-md-12">
							<br>
							<br>	

							<button ng-click="actions.update()" class="btn btn-primary pull-right">Cập nhật</button>
							<a style=" margin-right: 5px;" class=" btn btn-default pull-right" href="{{route('posts')}}">
								<!-- <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size: 15px;"></i>  -->
								Hủy
							</a>
							
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-default my-btn-image">
					<div class="panel-body">
						<div class="vietbai_images">
							<h4>Ảnh bài viết</h4>
							<div class="input-group my-btn-image" >
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </span>
                                <input disabled="" style="display: none;" ng-model="getData.avatar" id="thumbnail" class="form-control" type="text" name="imageTitle"/>
                                    
                            </div>
                            
                            <img id="holder" ng-dom="domAvatar" style="margin-top:15px;max-height:150px; max-width: 100px;">
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>Chuyên mục</h4>
							<select required class="form-control" ng-model="getData.business_id">
                                <option ng-value="val.id" ng-repeat="(key, val) in listCateBusiness">@{{val.name}}</option>
                            </select>
							<div ng-repeat="err in data.errors.business_id" style="color: red; margin-top:5px;">
								@{{ err }}
							</div>
					</div>
				</div>
			</div>
		</div>
	</form>
        </div>
    </div>    
</div>
