<div class="flex justify-end">
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'p-2 bg-darkblue text-white rounded-full text-center shadow font-bold text-[20px]']) }}>
        {{ $slot }}
    </button>
</div>
