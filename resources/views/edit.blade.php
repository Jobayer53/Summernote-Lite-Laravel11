
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <style>
        img{
            width: 100% !important;
            display: flex !important;
            margin: auto !important;
        }
        iframe {
            display: block;
            margin: auto;
            max-width: 100%;
            max-height: 100%;
        }
        .table {
            width: 100% !important;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #ccc;
        }

        .table th, .table td {
            padding: 8px;
            border: 1px solid #ccc;
            word-wrap: break-word;
        }
        .table td {
            word-wrap: break-word !important;
            word-break: break-word !important;
            width : 100px !important; /* Adjust the width as needed */
        }

        @media (max-width: 576px) {
            img{
                width: 100% !important;
            }
            iframe {
                width: 95%;
                height: 100%;
            }
        }
        @media (max-width: 767px) {
            .table {
                font-size: 8px; /* Adjust font size for smaller screens */
            }
        }
    </style>
<style>
    /* Define your table styles here */

    /* Responsive Styles */

  </style>
  </head>
  <body>
{{-- @php
    $datas = App\Models\Summernote::all();
@endphp --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <form action="{{ route('update') }}" method="POST">
                    @csrf
                <div class="card">
                    <div class="card-header">
                        <h3>test data</h3>
                    </div>
                    <div class="card-body">
                        <label for="">summernote</label>
                    </div>
                    <div >
                        <textarea name="data" id="summernote" cols="30" rows="10">{!! $datas->data !!}</textarea>
                        <input type="hidden" name="id" value="{{ $datas->id }}">
                    </div>
                    <button type="submit">submit</button>
                </div>
            </form>
            <a href="{{ route('welcome') }}" class="btn btn-primary"> back</a>

            </div>
            {{-- <div class="col-lg-12">
                @foreach ($datas as $data )
                    {!! $data->data !!}
                    <a href="{{ route('edit',$data->id) }}" class="btn btn-info">edit</a>
                @endforeach
            </div> --}}
        </div>
    </div>


    <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

  </body>
</html>
{{-- <table class="table table-bordered">
    <tbody>
        <tr>
            <td>sa</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>ssadfasdf</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>sfasdfasdf</td>
        </tr>
        <tr>
            <td>ssdfsadf</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
        </tr>
    </tbody> --}}

