<x-admin>
    <x-slot name="title">Admin</x-slot>
        
    <h1>Dashboard</h1>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
</x-admin>