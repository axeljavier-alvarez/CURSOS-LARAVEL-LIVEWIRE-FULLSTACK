<select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mx-auto px-4 sm:px-6 lg:px-8']) }}>
    {{ $slot }}
</select>
