<div class="container">

    @if (session()->has('success'))
        <x-alert type='success'>
            {{session('success')}}
        </x-alert>
    @endif
</div>