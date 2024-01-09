@props(['data'])

<div class="py-4 px-5 rounded-lg border border-grayLight">
    <div class="flex items-center">
        <div class="h-14 w-14 rounded-full bg-black"></div>
        <h2 class="font-bold text-xl ml-5 leading-none max-w-48 w-full">
            {{ $data->title }}
        </h2>
        <div class="flex flex-wrap ml-auto gap-2 max-w-[620px]">
            {{-- @foreach ($data->bonus as $item)
                <x-ui.tag :text="$item->title" />
            @endforeach --}}

        </div>

        <div class="ml-auto">
            <a href="#" class="btn bg-green text-white block w-[120px] text-center pt-[11px] pb-[12px]">Visit</a>
        </div>
    </div>
</div>
