@extends('backend.Layouts.default')
@section('title' , 'Chuyên mục')
@section('myJs')

@endsection


@section('content')
	<div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow"> Quản lý chuyên mục</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
</div>
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-body " >
            <div class="row form-group">
                <div class="col-md-12">
                    <div style="margin-top: 6px">
                        <label class="cat-email">Tìm kiếm theo tên</label>
                        <input placeholder="Tìm kiếm theo tên, sản phẩm" type="text" class="form-control" ng-enter="actions.filter()"  ng-model="filter.freeText">
                    </div>
                </div>
            </div>
            <div class="row cat-margin" >
                <div class="col-md-12 form-group" align="right" text-align="right">
                    <button ng-click="actions.showModal()" class="btn btn-primary btn-md" style="margin-bottom: 5px;"><i class="fa fa-plus fa-lg cat-fa-del" aria-hidden="true" ></i>Chuyên mục
                    </button>
                </div>
            </div>
            <div class="panelContact">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên chuyên mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Xe máy</td>
                            <td>
                                <i ng-click="actions.showModal(contact)" class="fa fa-pencil-square-o btn btn-info btn-icon btn-circle" aria-hidden="true"></i>
								<i ng-click="actions.deleteContact(contact.id)" class="btn btn-danger btn-icon btn-circle  fa fa-times" aria-hidden="true"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- <div class="row text-center">
                     <ul class="pagination" >
                         <div paging
                              page="paging.current_page" 
                              page-size="paging.per_page" 
                              total="paging.total"
                              paging-action="actions.changePage(page)"
                              >
                         </div>  
                     </ul>
                 </div> -->
            </div>
        </div>
       <!--  <contact-modal dom-contact="domContact" form-contact="formContact" single-contact ="singleContact" ret-func="actions.saveContact(data,id,error)"></contact-modal> -->
    </div>    
</div>
@endsection