@extends('layouts.adminbase')

@section('title', 'Add Package')


@section('content')

MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height"> 
            <h3><i class="fa fa-angle-right"></i>Add Package</h3>
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Package Elements</h4>
                    
                    <form class="form-horizontal style-form" method="post" action="{{route('admin.package.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Parent Package</label>
                            
                            <select class="col-sm-2 col-sm-2 control-label" name="category_id">
                                @foreach($data as $rs)
                                    <option value="{{$rs->id}}">{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" placeholder="title">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Keywords</label>
                            <div class="col-sm-10">
                                <input type="text" name="keywords" class="form-control" placeholder="keywords">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" placeholder="descripe">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Detail</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="detail">

                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" class="form-control" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Passenger</label>
                            <div class="col-sm-10">
                                <input type="number" name="passenger" class="form-control" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Status</label>
                            <select class="col-sm-2 col-sm-2 control-label" name="status" >
                                <option>---select---</option>
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 10px">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding: 1px">Image</label>
                            <div>
                                <input type="file" name="image" >
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
            
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->



@endsection 