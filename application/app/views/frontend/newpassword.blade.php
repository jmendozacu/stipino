    <main>

      <div class="login-block">
      <a class="logo" href="{{ URL::route('getlanding') }}">
     
       </a>
        <h1>Unesite novu lozinku</h1>

       {{ Form::open(array('route' => 'sendNewPassword', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
       {{ Form::hidden('token', $_GET["token"] , array('id' => 'token')) }}

           <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
              {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder'=>'Nova lozinka', 'required')) }}
                @if (isset($errors) && ($errors->first('password') != '' || $errors->first('password') != null))
                <p><em>{{ $errors->first('password') }}</em></p>
                @endif

            </div>
          </div>
          
     

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
              {{ Form::password('repeatpassword', array('id' => 'repeatpassword', 'class' => 'form-control', 'placeholder'=>'Ponovite lozinku', 'required')) }}
                @if (isset($errors) && ($errors->first('repeatpassword') != '' || $errors->first('repeatpassword') != null))
                <p><em>{{ $errors->first('repeatpassword') }}</em></p>
                @endif

            </div>
          </div>

          {{ Form::button('Napravite', array('type' => 'submit', 'class' => 'btn button-about btn-newpassword-align')) }}
        {{ Form::close() }}

      </div>




    </main>
