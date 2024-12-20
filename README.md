## saya juga mengubah login di folder 'vendor/filament/filament/resources/views/pages/auth/login.blade.php' menjadi :

```<x-filament::card>
    <form method="POST" action="{{ route('external.login') }}">
@csrf
<x-filament::input name="email" type="email" label="Email" required />
<x-filament::input name="password" type="password" label="Password" required />
<x-filament::button type="submit">Login</x-filament::button>
</form>
</x-filament::card>
```
