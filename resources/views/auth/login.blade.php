@extends('layouts.main')

@section('title', 'Login - Varin SkillUp Academy')
@section('description', 'Sign in to your Varin SkillUp Academy account')

@section('content')
    <section class="py-16 bg-gradient-to-b from-light to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto">
                <div class="bg-white shadow-lg rounded-2xl p-8">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/varin-academy-logo.svg') }}" alt="Varin SkillUp Academy"
                            class="mx-auto h-12 w-12 mb-3">
                        <h1 class="text-2xl font-bold text-primary">Welcome back</h1>
                        <p class="mt-1 text-gray-600 text-sm">Sign in to manage your academy</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mt-4 mb-2" :status="session('status')" />

                    <form class="mt-6 space-y-4" method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me + Forgot -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-primary hover:underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <x-primary-button class="w-full justify-center">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </form>
                </div>

                <p class="mt-6 text-center text-xs text-gray-500">© {{ date('Y') }} Varin SkillUp Academy</p>
            </div>
        </div>
    </section>
@endsection
