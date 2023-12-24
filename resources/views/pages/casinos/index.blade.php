@extends('layouts.main')
@section('content')
    <section class=" bg-blackLight py-16 text-white">
        <div class="container">
            <div class="flex ">
                <div class="w-[600px]">
                    <h1 class="h1 uppercase">Online casino reviews (2023)</h1>
                    <p>Accurate Information & Real Player Reviews</p>
                    <p>
                        Affiliate Disclosure: Using our links to visit and deposit funds may earn us a commission, with no
                        impact on your expenses. Learn more
                    </p>

                    {{-- <form class="mt-8 flex gap-4 items-center maw-w-[600px] w-full">
                        <input type="text" placeholder="Search casino" class="grow">
                        <button type="submit " class="bg-green w-[120px] text-white hover:bg-[#15803d]">Search</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </section>


    <section class="mt-20">
        <div class="container">
            <h2 class="h2">Top 10 online casinos</h2>
        </div>
    </section>


    <section class="mt-20">
        <div class="container">
            <h2 class="h2">New Casinos</h2>

            <a href="#">All 243 New Online Casinos</a>
        </div>
    </section>


    <section class="mt-20">
        <div class="container">
            <h2 class="h2">All Casino List</h2>
            <p>Казино и сортировка подгрузка по аякс</p>
        </div>
    </section>

    <section class="mt-20">
        <div class="container">
            <h2 class="h2">Большой СЕО текст</h2>
        </div>
    </section>
    <div class="mt-20"></div>

    <x-section.subscribe class="mt-auto" title="Awesome Bonuses, New Casinos, <br> and Much More!"
        subtitle="Subscribe now to TopBonuse's free newsletter to be updated with the best bonus
            offers on our website, latest casinos and a selection of gambling related news & guides!" />
@endsection
