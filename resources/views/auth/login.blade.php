@extends('layouts.app')

@section('content')

    <div class="flex justify-center items-center h-full">
        <div class="border rounded w-1/3 p-10">
            <h1 class="text-3xl font-bold mb-5">Se Connecter</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="form-field">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">
                </div>

                <button class="btn primary float-right" type="submit">Connexion</button>
            </form>
        </div>
    </div>

@endsection
