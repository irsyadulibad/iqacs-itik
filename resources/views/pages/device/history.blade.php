<x-app-layout>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
        <div class="bg-slate-100 px-4 py-3 border-b">
            <h3 class="text-md font-semibold text-gray-900">{{ $title }}</h3>
        </div>
        <div class="p-4">
            <canvas
                id="history-chart"
                data-type="{{ $type }}"
                data-unit="{{ $unit }}"
            ></canvas>
        </div>
    </div>
</x-app-layout>
