@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen flex justify-center items-start bg-gray-50 py-10">
    <div class="w-full max-w-5xl bg-white shadow rounded-3xl p-10">

        {{-- Title --}}
        <h1 class="text-xl font-semibold mb-10">History</h1>

        {{-- Empty State --}}
        <div class="w-full h-[60vh] flex items-center justify-center">
            <p class="text-gray-400">No history yet</p>
        </div>

    </div>
</div>
@endsection
