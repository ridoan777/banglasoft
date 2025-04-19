<x-master>
	<div id="homeWrapper" class="">

		<section id="homeCarousel" class="h-64 w-full bg-red-100 flex items-center justify-center">
			<h3>This area is reserved for carousel</h3>
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
	#scroll-text {
		/* animation properties */
		-moz-transform: translateX(100%);
		-webkit-transform: translateX(100%);
		transform: translateX(100%);

		-moz-animation: my-animation 15s linear infinite;
		-webkit-animation: my-animation 15s linear infinite;
		animation: my-animation 25s linear infinite;
	}

	/* for Firefox */
	@-moz-keyframes my-animation {
		from {
			-moz-transform: translateX(100%);
		}

		to {
			-moz-transform: translateX(-100%);
		}
	}

	/* for Chrome */
	@-webkit-keyframes my-animation {
		from {
			-webkit-transform: translateX(100%);
		}

		to {
			-webkit-transform: translateX(-100%);
		}
	}

	@keyframes my-animation {
		from {
			-moz-transform: translateX(100%);
			-webkit-transform: translateX(100%);
			transform: translateX(100%);
		}

		to {
			-moz-transform: translateX(-100%);
			-webkit-transform: translateX(-100%);
			transform: translateX(-100%);
		}
	}
</style>