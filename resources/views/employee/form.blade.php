
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
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
          <a href="{{ route('employee.index') }}" class="btn btn-primary px-4">Back</a>
        </div>

        <hr class="mb-5">

        <form class="row g-3" method="POST" action="@if( isset($model->id) ){{ route('employee.update', $model) }}@else{{ route('employee.store') }}@endif">
          @if( isset($model->id) ) @method('PUT') @else @method('POST') @endif
          @csrf
          <div class="col-4 offset-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{ $model->username }}">
          </div>
          <div class="col-4 offset-4">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="fullname" value="{{ $model->fullname }}">
          </div>
          <div class="col-4 offset-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ $model->email }}">
          </div>
          <div class="col-4 offset-4">
            <label for="moblie" class="form-label">Mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile" value="{{ $model->mobile }}">
          </div>
          <div class="col-4 offset-4">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" name="birthday" id="birthday" value="{{ $model->birthday }}">
          </div>
          <div class="col-4 offset-4 d-grid mt-5">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>

      </main>
      <footer class="pt-5 my-5 text-muted border-top">
        Made in Bali
      </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>
</html>
