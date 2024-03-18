
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <style>
         img:not(.note-editable > p > img) {
            width: 100% ;
            display: flex !important;
            margin: auto !important;
        }
        .note-editable > p > img{
            display: flex;
            margin: auto;
        }
        iframe {
            display: block;
            margin: auto;
            max-width: 100%;
            max-height: 100%;
        }


        table:not(.note-editable > table) {
            display: flex   ;
            overflow-x: auto;
            white-space: nowrap;
            width: 100%;
            border-collapse: collapse;
            justify-content: center;
            align-items: center;
        }

    table th,
    table td {
        padding: 8px;
        border: 1px solid #ccc;
        word-wrap: break-word;
    }


        @media (max-width: 576px) {
            .table {
                font-size: 8px; /* Adjust font size for smaller screens */
            }
            img:not(.note-editable > p > img) {
            width: 100% !important;
            }
            iframe {
                width: 95%;
                height: 100%;
            }
            .note-editable img {
                /* Add your CSS properties for the img element here */

            }
           }
        @media (max-width: 767px) {
            .table {
                font-size: 10px; /* Adjust font size for smaller screens */
            }

            img:not(.note-editable > p > img) {
                width: 100% !important;
            }
            iframe {
                width: 95%;
                height: 100%;
            }
        }
        @media (min-width: 768px) and (max-width: 992px) {
            img:not(.note-editable > p > img) {
                width: 100% !important;
            }
        }
    </style>
    <style>
.loader-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.loader {
  border: 2px solid #fff;
  border-top: 2px solid #1f96fd;

  border-bottom: 2px solid #1f96fd;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.hidden {
  animation: slideUp 0.5s forwards 0.8s;
}

@keyframes slideUp {
  0% { transform: translateY(0); }
  100% { transform: translateY(-100%); }
}

.content {
  display: none;
}

.hidden + .content {
  display: block;
}

    </style>

  </head>
  <body>
@php
    $datas = App\Models\Summernote::all();
@endphp

    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                <div class="card">
                    <div class="card-header">
                        <h3>test data</h3>
                    </div>
                    <div class="card-body">
                        <label for="">summernote</label>
                    </div>
                    <div >
                        <div name="data" id="summernote" cols="30" rows="10"></div>
                        <div id="wordCount"></div>
                    </div>
                    <button type="submit">submit</button>
                </div>
            </form>

            </div>
            <div class="col-lg-12">
                @foreach ($datas as $data )
                    {!! $data->data !!}
                    <a href="{{ route('edit',$data->id) }}" class="btn btn-info">edit</a>
                @endforeach
            </div>
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
          ],
          callbacks: {
            onKeyup: function(e) {
              var content = $(this).summernote('code');
              var wordCount = content.replace(/<(?:.|\n)*?>/gm, '').split(/\s+/).length;
              $('#wordCount').text(wordCount + " words");

              // Limiting word count to 1000
              if (wordCount > 10) {
                $(this).summernote('code', content.split(/\s+/).slice(0, 1000).join(' '));
                $('#wordCount').text("1000 words (maximum)");
                $('#submitButton').prop('disabled', true);
              } else {
                $('#submitButton').prop('disabled', false);
              }
            }
          }
        });
      </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <div class="loader-container">
        <div class="loader"></div>
      </div>
      <script>
        window.addEventListener('load', function() {
          const loaderContainer = document.querySelector('.loader-container');
          loaderContainer.classList.add('hidden');
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

