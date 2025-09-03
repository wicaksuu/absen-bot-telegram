@csrf
@php($user = $user ?? null)
<!-- Grid form agar responsif pada berbagai ukuran layar (AI) -->
<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <!-- Nama user -->
    <div>
        <x-label for="name" value="Nama" />
        <x-input id="name" type="text" name="name" :value="old('name', $user->name ?? '')" required />
    </div>
    <!-- Email user -->
    <div>
        <x-label for="email" value="Email" />
        <x-input id="email" type="email" name="email" :value="old('email', $user->email ?? '')" required />
    </div>
    <!-- Password login; kosongkan saat edit -->
    <div>
        <x-label for="password" value="Password" />
        <x-input id="password" type="password" name="password" />
    </div>
    <!-- NIP sebagai identitas -->
    <div>
        <x-label for="nip" value="NIP" />
        <x-input id="nip" type="text" name="nip" :value="old('nip', $user->nip ?? '')" />
    </div>
    <!-- Telegram ID untuk bot -->
    <div>
        <x-label for="telegramid" value="Telegram ID" />
        <x-input id="telegramid" type="text" name="telegramid" :value="old('telegramid', $user->telegramid ?? '')" />
    </div>
    <!-- Password absen eksternal -->
    <div>
        <x-label for="passwordAbsen" value="Password Absen" />
        <x-input id="passwordAbsen" type="text" name="passwordAbsen" :value="old('passwordAbsen', $user->passwordAbsen ?? '')" />
    </div>
    <!-- Nomor HP -->
    <div>
        <x-label for="nomorhp" value="Nomor HP" />
        <x-input id="nomorhp" type="text" name="nomorhp" :value="old('nomorhp', $user->nomorhp ?? '')" />
    </div>
    <!-- IMEI perangkat absen -->
    <div>
        <x-label for="imeiAbsen" value="IMEI Absen" />
        <x-input id="imeiAbsen" type="text" name="imeiAbsen" :value="old('imeiAbsen', $user->imeiAbsen ?? '')" />
    </div>
    <!-- Username untuk sistem absen -->
    <div>
        <x-label for="usernameAbsen" value="Username Absen" />
        <x-input id="usernameAbsen" type="text" name="usernameAbsen" :value="old('usernameAbsen', $user->usernameAbsen ?? '')" />
    </div>
    <!-- Token API absen -->
    <div>
        <x-label for="tokenAbsen" value="Token Absen" />
        <x-input id="tokenAbsen" type="text" name="tokenAbsen" :value="old('tokenAbsen', $user->tokenAbsen ?? '')" />
    </div>
    <!-- User agent absen -->
    <div>
        <x-label for="userAgentAbsen" value="User Agent Absen" />
        <x-input id="userAgentAbsen" type="text" name="userAgentAbsen" :value="old('userAgentAbsen', $user->userAgentAbsen ?? '')" />
    </div>
    <!-- Koordinat latitude -->
    <div>
        <x-label for="lat_absen" value="Lat Absen" />
        <x-input id="lat_absen" type="text" name="lat_absen" :value="old('lat_absen', $user->lat_absen ?? '')" />
    </div>
    <!-- Koordinat longitude -->
    <div>
        <x-label for="long_absen" value="Long Absen" />
        <x-input id="long_absen" type="text" name="long_absen" :value="old('long_absen', $user->long_absen ?? '')" />
    </div>
    <!-- Pemilihan peran user -->
    <div>
        <x-label for="role" value="Peran" />
        <select id="role" name="role" class="border-gray-300 rounded-md w-full">
            <option value="user" {{ old('role', $user->role ?? '') === 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>
    <!-- Tanggal kadaluarsa langganan -->
    <div>
        <x-label for="subscription_expires_at" value="Berakhir Langganan" />
        <x-input id="subscription_expires_at" type="date" name="subscription_expires_at" :value="old('subscription_expires_at', optional($user->subscription_expires_at)->format('Y-m-d'))" />
    </div>
</div>
<div class="mt-4">
    <x-button>{{ $submit }}</x-button>
</div>
