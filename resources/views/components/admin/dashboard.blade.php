<x-master>
   <div id="homeWrapper" class="p-4">

      <h1 class="text-center">Welcome back, Admin!</h1>
      <!------------>
      <x-partials.admin.carousel :carouselData="$carouselData"/>
      <!------------>
      <x-partials.admin.marquee :marqueeData="$marqueeData" />
      <!------------>
      <x-partials.admin.faq :faqData="$faqData"/>
      <!------------>

</x-master>