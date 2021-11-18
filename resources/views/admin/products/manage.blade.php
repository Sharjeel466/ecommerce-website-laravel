@extends('layouts.admin_layout')

@section('page_title','Products')
@section('page_select','Manage Products')
@section('product_select','active')
@section('container')

{{-- <a href="{{url('admin/product')}}">
   <button type="button" class="btn btn-success">
      Back
   </button>
</a> --}}
<div class="row">
   <div class="col-md-12">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <form action="{{url('admin/product-manage')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label class="control-label mb-1"> Name</label>
                        <input name="name" type="text" class="form-control" value="{{$product['name']}}" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label mb-1">Price</label>
                        <input name="price" type="text" class="form-control" value="{{$product['price']}}" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label mb-1">Description</label>
                        {{-- <input name="price" type="text" class="form-control" value="{{$product['price']}}" required> --}}
                        <textarea name="desc" type="text" class="form-control">{{$product['desc']}}</textarea>
                     </div>
                     <div class="form-group">
                        <label class="control-label mb-1"> Image</label>
                        <input name="image" type="file" class="form-control" required>
                        @if($product['image']!='')
                        <a href="{{asset('public/admin_assets/images/products/'.$product['image'])}}" target="_blank"><img width="100px" src="{{asset('public/admin_assets/images/products/'.$product['image'])}}"/></a>
                        @endif
                     </div>
                     <div class="form-group">
                        <label class="control-label mb-1"> Category</label>
                        <select name="category" class="form-control" required>
                           <option value="">Select Categories</option>
                           @foreach($category as $list)
                           @if ($product['category_id'] == $list->id)
                           <option selected value="{{$list->id}}">
                              @else
                              <option value="{{$list->id}}">
                                 @endif
                                 {{$list->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <input type="hidden" name="id" value="{{$product['id']}}"/>

                           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                              Submit
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endsection