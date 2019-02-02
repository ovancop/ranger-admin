@extends('index')

@section('content')


<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create News</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('news/save')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <!-- <input type="text" class="form-control" name="title" placeholder="Title"> -->
                  {!! Form::text('title',isset($data->title) ? $data->title : null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Brief</label>
                  <!-- <input type="text" class="form-control" name="title" placeholder="Title"> -->
                  {!! Form::text('brief',isset($data->brief) ? $data->brief : null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <!-- <input type="text" class="form-control" name="title" placeholder="Title"> -->
                  {!! Form::text('description',isset($data->description) ? $data->description : null,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                 <!--  <select class="form-control" name="status">
                    <option value="publish">Publish</option>
                    <option value="unpublish">UnPublish</option>
                  </select> -->
                  {!! Form::select('status',['publish'=>'Publish','unpublish'=>'Unpublish'], isset($data->status) ? $data->status : null,['class'=>'form-control']) !!}
                </div>
                
                <label for="topic">Topik</label>
                @if($topic)
                @foreach($topic->data as $t)
                <div class="form-group">
                  {!! Form::checkbox('topic_id[]',$t->id, in_array($t->id, $newsTopic) ? 1 : null ) !!} {{$t->title}}
                </div>
                @endforeach
                @endif
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