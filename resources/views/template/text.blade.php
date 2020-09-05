@extends('layouts.app')

@section('title', 'Admin Dashboard')
@push('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
  .table.table-bordered td, .table.table-bordered th {
    border-color: #000 !important;
  }
  .table-bordered, .table-bordered td, .table-bordered th {
    border: 2px solid #000 !important;
  }
</style>
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="card">

        
      </div>
    </div>
  </section>
  <form action="/demo" method="post">
    @csrf
    <div class="bg-white">
      <textarea name="text" id="summernote"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
  </form>
 
@endsection
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $('#summernote').summernote({
    placeholder: 'Hello stand alone ui',
    tabsize: 10,
    height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['codeview', 'help']]
    ],
    styleTags: [
    'p',
    { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	  ],
    // airMode: true
  });
</script>
@endpush