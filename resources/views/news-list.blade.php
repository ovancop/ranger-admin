@extends('index')

@section('content')

	
	  <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">News List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.box-header -->
            <a href="{{url('news/save')}}" class="btn btn-primary">Add News</a>
            <br/>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Brief</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @if($data)
                @foreach($data->data as $val)
                <tr>
                  <td>{{$val->id}}</td>
                  <td>{{$val->brief}}</td>
                  <td>{{$val->title}}</td>
                  <td><span class="label @if($val->status == 'publish')label-success @else label-danger @endif">{{$val->status}}</span></td>
                  <td><a href="{{url('news/save/'.$val->id)}}" class="">Edit</a></td>
                  <td><a href="{{url('news/delete/'.$val->id)}}" class="">Delete</a></td>
                </tr>
                @endforeach
                @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection