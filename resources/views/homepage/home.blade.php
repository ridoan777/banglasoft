<x-master>
	<div id="homeWrapper" class="">

		<section id="homeCarousel" class="w-full p-1">
			<h3>This area is reserved for carousel</h3>

			<div id="default-carousel" class="relative w-full" data-carousel="slide">
			 <!-- Carousel wrapper -->
				<div class="relative h-56 overflow-hidden rounded-lg md:h-96">

					@foreach($carouselData as $index => $carouselItem)
						<!-- Item 1 -->
					<div class="hidden duration-700 ease-in-out" data-carousel-item="@if($index == 0) active @endif">
							<img src="{{ $carouselItem->slider_img }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $carouselItem->slider_img }}">
					</div>
					@endforeach
				</div>
			 <!-- Carousel wrapper -->
			  
			 <!-- Slider indicators -->
				<div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
				 @foreach($carouselData as $index => $carouselItem)
					<button type="button" class="w-3 h-3 rounded-full bg-gray-900" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index+1 }}" data-carousel-slide-to="{{ $index }}"></button>
				 @endforeach
				</div>
			 <!-- Slider indicators -->
			 <!-- Slider controls -->
				<button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
					<span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
							<svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
							</svg>
							<span class="sr-only">Previous</span>
					</span>
				</button>
				<button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
					<span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
							<svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
							</svg>
							<span class="sr-only">Next</span>
					</span>
				</button>
			 <!-- Slider controls -->
			</div>
			<!--  -->



			<!--  -->

		</section>
		<!------------>
		<section id="homeMarquee">
			<div id="scroll-container" class="py-2 {{ $marqueeData->{'bg-color'} }} {{ $marqueeData->{'color'} }} overflow-hidden">
				<div id="scroll-text">{{ $marqueeData->content }}
					<div>
					</div>
				</div>
			</div>
		</section>
		<!------------>
		<section id="homeReview" class="h-64 w-full  flex items-center justify-center">
			<h3>This area is reserved for Review</h3>
		</section>
		<!------------>
		<section id="faq" class="w-2/3 mx-auto bg-white dark:bg-gray-600">
			<h3 class="py-2 text-center">Frequently Asked Questions</h3>
			<div id="accordion-open" data-accordion="collapse">

				<div id="accordion-collapse" data-accordion="collapse">
			 	 @foreach ($faqData as $index => $faq)
				
					<h5 id="accordion-collapse-heading-{{ $faq->id }}"  style="margin: 0px !important;">
						<button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 dark:text-gray-200 border border-b-0 border-gray-200 rounded-t-xl  dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{ $faq->id }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="accordion-collapse-body-{{ $faq->id }}">
							<span>{{ $faq->title }}</span>
							<svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
							</svg>
						</button>
					</h5>
					<div id="accordion-collapse-body-{{ $faq->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $faq->id }}">
						<div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
							<p class="mb-2 text-gray-500 dark:text-gray-400">{{ $faq->content }}</p>
						</div>
					</div>

				 @endforeach
				</div>

			</div>

		</section>

		<!------------>
		<div class="dummyDiv h-16 w-full"></div>


</x-master>
<!-- ------------------- -->
<style id="Style_homeMarquee">

</style>
