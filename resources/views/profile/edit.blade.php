@extends('layouts.app')

{{-- Menentukan header halaman --}}
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Bagian Pembaruan Informasi Profil --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- Komponen Livewire/Volt untuk mengelola Nama, Email, dan Telepon --}}
                    @livewire('profile.update-profile-information-form')
                </div>
            </div>

            {{-- Bagian Pembaruan Password --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- Komponen Livewire/Volt untuk pembaruan password --}}
                    @livewire('profile.update-password-form')
                </div>
            </div>

            {{-- Bagian Hapus Akun --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- Komponen Livewire/Volt untuk menghapus akun --}}
                    {{-- Catatan: Logika penghapusan utama ada di ProfileController@destroy --}}
                    @livewire('profile.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
@endsection