<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Push SMS</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #378cf5">
      <a class="navbar-brand" href="#">PUSH SMS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="/">Accueil <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Description</a>
          <a class="nav-item nav-link" href="#">Contact</a>
          
        </div>
      </div>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="margin-top: 5%;">
           @if(session('success'))
              <div class="alert alert-success" style="color:white;background-color:green">
                {{session('success')}} 
              </div>  
            @endif
            @if(session('error'))
              <div class="alert alert-error" style="color:white;background-color:red">
                  {{session('error')}}
              </div>
            @endif
              @if(!$errors->isEmpty())
                 <div class="alert alert-danger">
                 @foreach($errors->all() as $error)
                   {{$error}}<br/>
                 @endforeach
                 </div>
            @endif 
            <form action="{{ route('sendSMS')}} " method="POST">
              {{csrf_field()}}
                <div class="form-group">
                  <label >Numero destinateur</label>
                  <input type="number" class="form-control" id="number" name="number" placeholder="Entrer le numero du récepteur">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Message</label>
                  <textarea rows="5" cols="57" name="message" id="message">
                  
                  </textarea>

                </div>
                
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        <div class="col-md-3"></div>
        
    </div>    
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
    
