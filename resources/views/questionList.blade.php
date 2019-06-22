@extends('layouts.app2')

@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Pertanyaan
            <small>{{$category->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Daftar Pertanyaan</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Pertanyaan{{--$category->name--}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('category.detail.question.create',['categoryId'=>$category->id])}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Pertanyaan</label>
                                <input type="text" class="form-control" id="" name="question" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jawaban yang benar</label>
                                <select class="form-control" name="answer" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Rekomendasi Bila Jawaban Benar</label>
                                <textarea class="form-control" rows="4" placeholder="" name="correctAnswerRecommendation" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Rekomendasi Bila Jawaban Salah</label>
                                <textarea class="form-control" rows="4" placeholder="" name="wrongAnswerRecommendation" required></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Kategori Pertanyaan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="question-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px; text-align:center">No</th>
                                    <th>Pertanyaan</th>
                                    <th style="width:50px; text-align:left">Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($questions); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$questions[$i]->question}}</td>
                                    <td><a href="{{route('category.detail.question.edit.page',['categoryId'=>$category->id,'questionId'=>$questions[$i]->id])}}"><button type="button" class="btn btn-primary btn-flat btn-block">UBAH</button></a></td>
                                </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Ubah</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
        $('#question-list').DataTable({
        'paging'      : false,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true
    })
    })
</script>
@endsection