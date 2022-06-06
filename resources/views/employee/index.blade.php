
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .icon-list li::before {
        display: block;
        flex-shrink: 0;
        width: 1.5em;
        height: 1.5em;
        margin-right: .5rem;
        content: "";
      }
    </style>

  </head>
  <body>

    <div class="col-lg-8 mx-auto p-3 py-md-5">

      <main>
        <h1>Employee</h1>

        <div class="my-5">
          <a href="{{ route('employee.create') }}" class="btn btn-primary px-4">Create New</a>
        </div>

        <hr class="mb-5">

        <div class="row g-5">
          <div class="col-md-12">

          <table class="table table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">Username</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Birthday</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $models as $model )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $model->username }}</td>
                <td>{{ $model->fullname }}</td>
                <td>{{ $model->email }}</td>
                <td>{{ $model->mobile }}</td>
                <td>{{ $model->birthday }}</td>
                <td class="text-end"><a href="{{ route('employee.edit', $model->id) }}" class="me-2"><svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M5,3C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19H5V5H12V3H5M17.78,4C17.61,4 17.43,4.07 17.3,4.2L16.08,5.41L18.58,7.91L19.8,6.7C20.06,6.44 20.06,6 19.8,5.75L18.25,4.2C18.12,4.07 17.95,4 17.78,4M15.37,6.12L8,13.5V16H10.5L17.87,8.62L15.37,6.12Z" /></svg></a>
                <a href="{{ route('employee.destroy', $model->id) }}" class="delete" mp-data="{{ $model->id }}"><svg style="width:20px;height:20px" viewBox="0 0 24 24" class="text-danger"><path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" /></svg></a></th>
              </tr>
              @endforeach
            </tbody>
          </table>

          </div>
        </div>
      </main>
      <footer class="pt-5 my-5 text-muted border-top">
        Made in Bali
      </footer>
    </div>

    <meta name="url_employee" content="{{ route('employee.index') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>

      $('.delete').click(function(e) {
        e.preventDefault();

        console.log( $(this).attr('mp-data') );

        $.ajax({
          url:$('meta[name=url_employee]').attr('content') + '/' + $(this).attr('mp-data'),
          type:"post",
          data:{
            _token:$('meta[name=csrf-token]').attr('content'),
            _method:'delete',
            id:$(this).attr('mp-data'),
          },
          success:function (response) {
            window.location.reload();
          },
          error:function(xhr, textStatus, errorThrown) {
            console.log(xhr.responseText);
          }
        });
        
      });
    </script>

  </body>
</html>
