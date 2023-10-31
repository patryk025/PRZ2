<x-app-layout>
    <x-slot name="header">
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{__('Formularz')}}
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="bg-white rounded-lg shadow overflow-hidden">
  <div class="px-6 py-4 bg-gray-100 border-b border-gray-200 font-bold uppercase">{{ __('Register') }}</div>
  <div class="px-6 py-4">
    <form method="POST" action="{{ route('register.store') }}">
      @csrf
      <div class="mb-4">
    <label for="name" class="block text-gray-700 font-bold mb-2">{{ __('Name') }}</label>
    <input id="name" type="text" class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
      <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

    @error('email')
      <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <label for="password" class="block text-gray-700 font-bold mb-2">{{ __('Password') }}</label>
    <input id="password" type="password" class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

    @error('password')
      <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <label for="password-confirm" class="block text-gray-700 font-bold mb-2">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="w-full px-4 py-2 border rounded-lg" name="password_confirmation" required autocomplete="new-password">
  </div>

  <div class="flex items-center justify-end">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      {{ __('Register') }}
    </button>
  </div>
</form>
</div>
</div>
    </div>
</x-app-layout>
