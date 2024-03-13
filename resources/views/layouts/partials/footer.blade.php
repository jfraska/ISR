<footer
    class="flex flex-wrap items-center justify-between border-t border-gray-100 px-4 py-4 text-sm"
>
    <div class="flex space-x-4">
        {{--
            @foreach (config('app.supported_locales') as $locale => $data)
            <a href="{{ route('locale', $locale) }}">
            <x-dynamic-component :component="'flag-country-' . $data['icon']" class="w-6 h-6" />
            </a>
            @endforeach
        --}}
    </div>
</footer>
