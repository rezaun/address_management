@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Village</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Village</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    @if (isset($editData))
                                        Edit Village
                                    @else
                                        Add Village
                                    @endif
                                    <a class="btn btn-success float-right" href="{{route('villages.view')}}"><i class="fa fa-list"> Village List</i></a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{(@$editData)?route('villages.update', $editData->id):route('villages.store')}}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Division Name</label>
                                            <select type="text" name="division_id" class="form-control" id="division_id">
                                                <option value="">Select Division</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{$division->id}}" {{(@$editData->division_id==$division->id)?"selected":""}}>{{$division->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">District Name</label>
                                            <select name="district_id" class="form-control" id="district_id">
                                                <option value="">Select District</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="name">Upazila Name</label>
                                            <select name="upazila_id" class="form-control" id="upazila_id">
                                                <option value="">Select Upazila</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="name">Union Name</label>
                                            <select name="union_id" class="form-control" id="union_id">
                                                <option value="">Select Union</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="name">Ward Name</label>
                                            <select name="ward_id" class="form-control" id="ward_id">
                                                <option value="">Select Ward</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="name">Village Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ @$editData->name }}" placeholder="Enter Village Name" >
                                            <small style="color:red;">{{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.Left col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        $(function () {
            $(document).on('change','#division_id',function () {
                var division_id = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{route('default.get-district')}}",
                    data:{division_id:division_id},
                    success:function (data) {
                        var html = '<option value="">Select District</option>';
                        $.each(data,function(key,v){
                            html +='<option value="'+v.id+'">'+v.name+'</option>'
                        });
                        $('#district_id').html(html);
                        var district_id = "{{@$editData->district_id}}";
                        if(district_id !=''){
                            $('#district_id').val(district_id).trigger('change');
                        }
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(document).on('change','#district_id',function () {
                var district_id = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{route('default.get-upazila')}}",
                    data:{district_id:district_id},
                    success:function (data) {
                        var html = '<option value="">Select Upazila</option>';
                        $.each(data,function(key,v){
                            html +='<option value="'+v.id+'">'+v.name+'</option>'
                        });
                        $('#upazila_id').html(html);
                        var upazila_id = "{{@$editData->upazila_id}}";
                        if(upazila_id !=''){
                            $('#upazila_id').val(upazila_id).trigger('change');
                        }
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(document).on('change','#upazila_id',function () {
                var upazila_id = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{route('default.get-union')}}",
                    data:{upazila_id:upazila_id},
                    success:function (data) {
                        var html = '<option value="">Select Union</option>';
                        $.each(data,function(key,v){
                            html +='<option value="'+v.id+'">'+v.name+'</option>'
                        });
                        $('#union_id').html(html);
                        var union_id = "{{@$editData->union_id}}";
                        if(union_id !=''){
                            $('#union_id').val(union_id).trigger('change');
                        }
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(document).on('change','#union_id',function () {
                var union_id = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{route('default.get-ward')}}",
                    data:{union_id:union_id},
                    success:function (data) {
                        var html = '<option value="">Select Ward</option>';
                        $.each(data,function(key,v){
                            html +='<option value="'+v.id+'">'+v.name+'</option>'
                        });
                        $('#ward_id').html(html);
                        var ward_id = "{{@$editData->ward_id}}";
                        if(ward_id !=''){
                            $('#ward_id').val(ward_id);
                        }
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">

        $(function () {
            var division_id = "{{@$editData->division_id}}";
            if (division_id){
                $('#division_id').val(division_id).trigger('change');
            }
        })
    </script>
    {{--<script type="text/javascript">--}}
    {{--$(function () {--}}
    {{--var district_id = "{{@$editData->district_id}}";--}}
    {{--if (district_id){--}}
    {{--$('#district_id').val(district_id).trigger('change');--}}
    {{--}--}}
    {{--})--}}
    {{--</script>--}}
@endsection
