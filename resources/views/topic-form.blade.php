@extends('index')

@section('content')


<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Topic</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('topic/save')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <!-- <input type="text" class="form-control" name="title" placeholder="Title"> -->
                  {!! Form::text('title',isset($data->title) ? $data->title : null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                 <!--  <select class="form-control" name="status">
                    <option value="publish">Publish</option>
                    <option value="unpublish">UnPublish</option>
                  </select> -->
                  {!! Form::select('status',['publish'=>'Publish','unpublish'=>'Unpublish'], isset($data->status) ? $data->status : null,['class'=>'form-control']) !!}
                </div>
                
                {!! Form::hidden('id',isset($data->id) ? $data->id : null,['class'=>'form-control']) !!}

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
]
        </div>
  </div>

@endsection