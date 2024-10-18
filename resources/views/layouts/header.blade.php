<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
  
    @foreach (['success', 'error', 'warning'] as $msg)
    <div class="flex justify-end fixed top-0 right-0 w-full">
        @if ($message = Session::get($msg))
            <div id="notification" 
                 class="w-1/3 p-4 rounded-md flex justify-between items-center animate-slide-in 
                        {{ $msg == 'success' ? 'bg-green-500' : ($msg == 'error' ? 'bg-red-500' : 'bg-yellow-500') }} text-white">
                <strong>{{ $message }}</strong>
                <button type="button" class="text-white ml-4 focus:outline-none" onclick="closeNotification()">
                    &#120;
                </button>
            </div>
        @endif
    </div>
@endforeach

<script>
    setTimeout(() => {
        closeNotification();
    }, 3000);  

    function closeNotification() {
        const notification = document.getElementById('notification');
        if (notification) {
            notification.classList.remove('animate-slide-in');
            notification.classList.add('animate-slide-out');
            
            setTimeout(() => {
                notification.remove();
            }, 500); 
        }
    }
</script>

    {{-- @include('layouts.navbar') --}}
     @yield('content')
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
</body>
</html>