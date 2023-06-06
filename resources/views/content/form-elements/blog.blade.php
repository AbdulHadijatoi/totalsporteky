@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor
      .create(document.querySelector('#editor'), {
          toolbar: {
              items: [
                  'heading',
                  '|',
                  'bold',
                  'italic',
                  'underline',
                  'link',
                  'bulletedList',
                  'numberedList',
                  'alignment',
                  'indent',
                  'outdent',
                  'imageUpload',
                  'blockQuote',
                  'insertTable',
                  'mediaEmbed',
                  'undo',
                  'redo'
              ]
          },
          language: 'en',
          image: {
              toolbar: [
                  'imageTextAlternative',
                  'imageStyle:full',
                  'imageStyle:side'
              ]
          },
          table: {
              contentToolbar: [
                  'tableColumn',
                  'tableRow',
                  'mergeTableCells'
              ]
          },
          mediaEmbed: {
              previewsInData: true
          },
          indentBlock: {
              offset: 1,
              unit: 'em'
          }
      })
      .then(editor => {
          console.log('CKEditor initialized successfully.');
      })
      .catch(error => {
          console.error('Error initializing CKEditor:', error);
      });
      </script>
@endsection

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Add /</span> Blogs
</h4>

<div class="row">
  
<form action="{{ route('save-blog') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="col-xl-8">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">Blogs</h5>
      <div class="card-body">
      
        
      <div class="mb-3 row">
        <label for="html5-text-input" class="col-md-2 col-form-label">Title</label>
        <div class="col-md-10">
          <input class="form-control" type="text" name="title" value="" required id="html5-text-input" />
        </div>
      </div>

      <div class="mb-3 row">
        <label  for="html5-text-input"  class="col-md-2 col-form-label">Description</label>

        <div class="col-md-10">
          <textarea name="description" id="editor"  style="height: 400px;"></textarea>
          </div>
      </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Upload Picture</label>
          <div class="col-md-10">
            <input class="form-control" type="file" required  name="image"  />
          </div>
  
       </div>
        <button type="submit" class="btn btn-primary">ADD</button>
  
      
  </div>
  </div>
   
  </div>
</form>
</div>
@endsection

