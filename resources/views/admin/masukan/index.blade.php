@extends('layouts.admin')

@section('styles')
    <!-- JQuery DataTable Css -->
    <link href="{{ url('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        {{ $wisata->name }}
                    </h1>
                    <a href="{{ url('admin/'.$wisata->id.'/create') }}" class="btn btn-primary waves-effect">Tambah Villa</a>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                	<th>No</th>
                                    <th>Nama</th>
                                    <th>Price</th>
                                    <th>Latitude/Longitude</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $n = 1; @endphp
                                @if(count($wisata->villa) > 0)
                                @foreach($wisata->villa as $villa)
                                <tr>
                                	<td>{{ $n }}</td>
                                    <td>{{ $villa->name }}</td>
                                    <td>{{ $villa->price }}</td>
                                    <td>{{ $villa->lat }} , {{ $villa->long }}</td>
                                    <td>{{ $villa->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('/'.$villa->wisata->slug.'/'.$villa->slug) }}" target="_blank" class="btn btn-info btn-xs waves-effect">View</a>
                                        <a href="{{ url('admin/'.$villa->wisata->id.'/'.$villa->id.'/edit') }}" class="btn btn-success btn-xs waves-effect">Edit</a>
                                        <form action="{{ url('admin/'.$villa->wisata->id.'/'.$villa->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Villa Ini ?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @php $n++; @endphp
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<!-- Jquery DataTable Plugin Js -->
	<script src="{{ url('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
	<script src="{{ url('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
@endsection

@section('datatable')
	<script src="{{ url('js/pages/tables/jquery-datatable.js') }}"></script>
@endsection
