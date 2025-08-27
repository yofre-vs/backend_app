 @extends('Layouts.default.main')

@section('title', 'Bienvenido')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')<span>{{ $message }}</span>@enderror
    </div>
    <div>
        <label>Contraseña</label>
        <input type="password" name="password" required>
        @error('password')<span>{{ $message }}</span>@enderror
    </div>
    <div>
        <label>
            <input type="checkbox" name="remember"> Recordarme
        </label>
    </div>
    <button type="submit">Iniciar sesión</button>
</form>

     
 @endsection