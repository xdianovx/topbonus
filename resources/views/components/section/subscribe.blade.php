@props(['class', 'title' => null, 'subtitle' => null])

<section class="bg-blackLight py-16 text-white {{ $class }} " :class="" {{ $attributes }}>
    <div class="container">
        <div class="flex flex-col mx-auto items-center max-w-[640px]">
            <div>
                <img src="{{ asset('images/email.svg') }}" class="w-[64px] h-auto block" alt="Email">
            </div>
            <h3 class="text-center text-3xl font-bold mt-5 ">{!! $title !!}</h3>

            <p class='text-gray-400 mt-4 text-center'>{!! $subtitle !!}

            </p>
            <div class="flex gap-4 mt-8 w-full">
                <input class="pt-[14px] pb-[15px] grow px-[15px] rounded-[8px] leading-none text-black" type="email"
                    placeholder="Subscribe to our newsletter">
                <button
                    class="block pt-[14px] pb-[15px] px-[24px] bg-orange text-white rounded-[8px]">Subscribe</button>
            </div>
            <p class="text-gray text-center mt-4">
                By signing up you are certifying that you have read and accepted
                TopBonus <a href="#" class="link__inline">Terms & Conditions</a> and <a href="#"
                    class="link__inline">Privacy Policy
                </a>
            </p>
        </div>
    </div>
</section>
