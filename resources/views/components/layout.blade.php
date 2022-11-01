<x-base-layout>
  <nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
      @auth
        <li>
          <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
        </li>
        <li>
          <a href="/listings" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>Mange Listings</a>
        </li>
        <li>
          <form action="/logout" class="inline" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">
              <i class="fa-solid fa-door-closed"></i> Logout
            </button>
          </form>
        </li>
      @else
        <li>
          <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
        <li>
          <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login</a>
        </li>
      @endauth
    </ul>
  </nav>
  <main>
    {{ $slot }}
  </main>
  <footer
    class="relative w-full flex items-center justify-start font-bold bg-laravel text-white h-36 mt-10 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
  </footer>
  <x-flash-message />

</x-base-layout>
