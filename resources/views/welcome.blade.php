@extends('layouts.main')
@section('content')
    <section class=" bg-blackLight py-16 text-white">
        <div class="container">
            <div class="flex ">
                <div class="w-[600px]">
                    <h1 class="h1 uppercase">The World’s Best Source of Bonuses, Games & Casino Reviews</h1>

                    <div class="mt-8 flex gap-4 items-center maw-w-[600px] w-full relative">
                        <input type="text" placeholder="Search Bonuses and Casinos"
                            class="grow search border-accent border-2" data-route="{{ route('index') }}">
                        {{-- <button type="submit" class="bg-green w-[120px] text-white hover:bg-[#15803d]">Search</button> --}}
                        <div
                            class="absolute search-results rounded-lg w-full transition-all duration-200 ease-out bg-white overflow-hidden text-black  max-h-[200px] h-0 top-full mt-4 ">
                            <div class="p-5 inner border border-gray overflow-y-scroll max-h-[200px]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-20">
        <div class="container">
            <h2 class="h2">Featured Casinos December 2023</h2>
            <div class="flex flex-col mt-8 gap-4">
                @foreach ($casinos as $item)
                    <x-ui.casino-item :data="$item" />
                @endforeach

            </div>
        </div>
    </section>

    <section class="mt-20">
        <div class="container">
            <h2 class="h2">Latest News</h2>
            <div class="grid grid-cols-3 mt-8 gap-4">
                <x-ui.news-item />
                <x-ui.news-item />
                <x-ui.news-item />
                <x-ui.news-item />
                <x-ui.news-item />
                <x-ui.news-item />
            </div>

            <a href="#" class="btn mx-auto block mt-8 text-white bg-orange text-center max-w-[140px]">All
                News</a>
        </div>
    </section>

    <section class="mt-20">
        <div class="container">
            <h2 class="h2">SEO Title About features</h2>
            <div class="mt-8 flex justify-between">
                <div>
                    <h4>42k</h4>
                </div>
                <div>
                    <h4>42k</h4>
                </div>
                <div>
                    <h4>42k</h4>
                </div>
                <div>
                    <h4>42k</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-20">
        <div class="container">
            <h2 class="h2">Newest Online Casinos</h2>
            <p class="mt-2">Interested in the latest additions to our extensive casinos list? You can find them
                all on
                <a href="#" class="link__inline"> Online Casinos page</a>.
            </p>
            <div class="mt-8 gap-4 flex flex-col rounded-lg">
                <x-ui.new-casino-item rating=5 />
                <x-ui.new-casino-item rating=2 />
                <x-ui.new-casino-item rating=3 />
                <x-ui.new-casino-item />
                <x-ui.new-casino-item />
            </div>
            <a href="#" class="btn bg-green mt-8 text-white mx-auto block w-[180px]">All New Casinos</a>
        </div>
    </section>

    <div class="mt-20"></div>

    <x-section.subscribe class="mt-auto" title="Awesome Bonuses, New Casinos, <br> and Much More!"
        subtitle="Subscribe now to TopBonuse's free newsletter to be updated with the best bonus
            offers on our website, latest casinos and a selection of gambling related news & guides!" />
@endsection
