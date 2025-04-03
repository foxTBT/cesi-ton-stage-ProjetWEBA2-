@if (session('success'))
    <p class="text-center border-2 border-green-600 bg-white text-green-600 shadow-lg rounded-lg py-2"><strong>{{ session('success') }}</strong></p>
@elseif (session('error'))
    <p class="text-center border-2 border-red-600 bg-white text-red-600 shadow-lg rounded-lg py-2"><strong>{{ session('error') }}</strong></p>
@endif
