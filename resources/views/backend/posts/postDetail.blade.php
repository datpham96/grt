
	<div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow"> Quản lý bài viết</h1>
        
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
</div>
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-body " >
            <form ng-enter="actions.saveInsert()" data-parsley-validate id="form-insert-post">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">	
							<h4>Tiêu đề</h4>	
							<input required  ng-model="data.params.title"  class="form-control" type="" name="" placeholder="Tiêu đề bài viết...">
							<div ng-repeat="err in data.errors.title" style="color: red; margin-top:5px;">
								@{{ err }}
							</div>
						</div>
						
						<div class="col-md-12">
							<h4>Mô tả</h4>
							<input required  ng-model="data.params.description"  class="form-control" type="" name="" placeholder="Mô tả bài viết...">
							<div ng-repeat="err in data.errors.description" style="color: red; margin-top:5px;">
								@{{ err }}
							</div>
						</div>

						<div class="col-md-12">	
							<h4>Nội dung</h4>

							<textarea required class="my-ckeditor" ng-model="data.params.post_content">
								
							</textarea>
							<div ng-repeat="err in data.errors.post_content" style="color: red; margin-top:5px;">
								@{{ err }}
							</div>	
						</div>
						
						<div class="col-md-12">
							<br>
							<br>	

							<button ng-click="actions.saveInsert()" class="btn btn-success pull-right">Cập nhật</button>
							<a style=" margin-right: 5px;" class=" btn btn-default pull-right" href="{{ url('') }}/admin/posts">
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
							<div class="input-group">
								<span class="input-group-btn">
									<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										<i class="fa fa-picture-o"></i> Chọn ảnh
									</a>
								</span>
								<input style="display: none;" id="thumbnail" class="form-control" type="text" name="imageTitle">
							</div>
							<img id="holder" style="margin-top:15px;max-height:100px;">
						</div>

						<div ng-repeat="err in data.errors.image" style="color: red; margin-top:5px;">
							<!-- @{{ err }} -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
        </div>
       <!--  <contact-modal dom-contact="domContact" form-contact="formContact" single-contact ="singleContact" ret-func="actions.saveContact(data,id,error)"></contact-modal> -->
    </div>    
</div>
