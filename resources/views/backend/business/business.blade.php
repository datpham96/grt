@extends('backend.Layouts.default')
@section('title' , 'Quản lý lĩnh vực kinh doanh')
@section('myJs')
<!-- directive -->
<script src="{{ url('')}}/js/directives/backend/modal/businessModal.js"></script>
<!-- service -->
<script src="{{url('')}}/js/factory/service/backend/businessService.js"></script>
<!-- backend -->
<script src="{{ URL::asset('/js/ctrl/backend/businessCtrl.js') }}"></script>
@endsection

@section('content')
    
<div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow"> Quản lý lĩnh vực kinh doanh</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
</div>
<div class="col-md-12" ng-controller="businessCtrl">
    <div class="panel panel-success">
        <div class="panel-body " >
            <div class="row form-group">
                <div class="col-md-12">
                    <div style="margin-top: 6px">
                        <label class="cat-email">Tìm kiếm theo tên</label>
                        <input placeholder="Tìm kiếm theo tên" type="text" class="form-control" ng-enter="actions.filter()" ng-model="filter.freeText">
                    </div>
                </div>
            </div>
            <div class="row cat-margin" >
                <div class="col-md-12 form-group" align="right" text-align="right">
                    <button ng-click="actions.modalInsert()" class="btn btn-primary btn-md" style="margin-bottom: 5px;"><i class="fa fa-plus fa-lg cat-fa-del" aria-hidden="true" ></i>Thêm chuyên mục
                    </button>
                </div>
            </div>
            <div class="panelContact">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên chuyên mục</th>
                            <th>Tên chuyên mục cha</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(key, val) in data.list">
                            <td>@{{ key + 1 }}</td>
                            <td>@{{ actions.formatChild(val.parent_id) }} @{{ val.name }}</td>
                            <td>@{{ actions.formatParent(val.parent_id) }}</td>
                            <td>
                                <i ng-click="actions.modalUpdate(val)" class="fa fa-pencil-square-o btn btn-info btn-icon btn-circle" aria-hidden="true"></i>
                                <i ng-click="actions.delete(val.id)" class="btn btn-danger btn-icon btn-circle  fa fa-times" aria-hidden="true"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
               
                <business-modal modal-dom="domData" form-data="formData" parent="listParent" single-data="dataSingle" dom-avatar ret-func="actions.saveData(data,id)"></business-modal>
            </div>

        </div>
        
    </div>    
    
</div>

@endsection