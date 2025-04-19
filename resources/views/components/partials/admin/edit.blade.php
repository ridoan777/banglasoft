<x-master>
   <h1 class="text-center">Welcome to Edit Page</h1>

 <!----- CAROUSEL ----->
   @if($triggerBlock == 'carousel')
   <section id="carouselBlock" class="p-4">

      <form action="{{ route('carouselUpdate', $carousel->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Replace your carousel file</label>

         <div class="px-2 flex space-x-4">
            <input class="block w-full" id="multiple_files" type="file" name="slider_img" multiple>

            <!-- status -->
            <select name="status" class="statusSelect">
               <option value="" class="text-black" disabled>Status</option>
               <option value="0">Disable</option>
               <option value="1" selected>Activate</option>
            </select>

            <button type="submit" class="saveButton">Save</button>
         </div>

      </form>

   </section>
   @endif
 <!----- CAROUSEL ----->

 <!----- MARQUEE ----->
   @if($triggerBlock == 'marquee')
   <section id="marqueeBlock" class="p-4">

      <form action="{{ route('marqueeUpdate', $marquee->id) }}" method="POST">
         @csrf
         <div class="w-full flex items-center gap-4 text-orange-500">

            <textarea type="text" name="content" id="text" class="w-100" required>{{ $marquee->content }}
            </textarea>

            <!-- bg-color -->
            @php
               $bgColors = [
                  'bg-gray-500' => 'Dark (#6b7280)',
                  'bg-black' => 'Black',
                  'bg-white' => 'White',
                  'bg-blue-500' => 'Blue (#3b82f6)',
                  'bg-green-500' => 'Green (#10b981)',
                  'bg-orange-500' => 'Orange (#dd6b20)',
               ];
            @endphp

            <select name="bg_color" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <option value="" class="text-black" disabled>Background</option>
               @foreach($bgColors as $value => $label)
               <option value="{{ $value }}" {{ $marquee->{'bg-color'} === $value ? 'selected' : '' }}>
                  {{ $label }}
               </option>
               @endforeach
            </select>


            <!-- color -->
            @php
               $textColors = [
                  'text-gray-500' => 'Dark (#6b7280)',
                  'text-black' => 'Black',
                  'text-white' => 'White',
                  'text-blue-500' => 'Blue (#3b82f6)',
                  'text-green-500' => 'Green (#10b981)',
                  'text-orange-500' => 'Orange (#dd6b20)',
               ];
            @endphp
            <select name="color" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <option value="" class="text-black" disabled>Font Color</option>
               @foreach($textColors as $value => $label)
               <option value="{{ $value }}" {{ $marquee->color === $value ? 'selected' : '' }}>
                  {{ $label }}
               </option>
               @endforeach
            </select>

            <!-- font-size -->
            <select name="font_size" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <option value="" class="text-black" disabled>Font Size</option>
               <option value="text-sm" {{ $marquee->{'font-size'} === 'text-sm' ? 'selected' : '' }}>14px</option>
               <option value="text-base" {{ $marquee->{'font-size'} === 'text-base' ? 'selected' : '' }}>16px</option>
               <option value="text-lg" {{ $marquee->{'font-size'} === 'text-lg' ? 'selected' : '' }}>18px</option>
               <option value="text-xl" {{ $marquee->{'font-size'} === 'text-xl' ? 'selected' : '' }}>20px</option>
               <option value="text-2xl" {{ $marquee->{'font-size'} === 'text-2xl' ? 'selected' : '' }}>24px</option>
               <option value="text-3xl" {{ $marquee->{'font-size'} === 'text-3xl' ? 'selected' : '' }}>30px</option>
            </select>

            <!-- status -->
            <select name="status" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <option value="" class="text-black" disabled>Status</option>
               <option value="0" {{ $marquee->status == 0 ? 'selected' : '' }}>Disabled</option>
               <option value="1" {{ $marquee->status == 1 ? 'selected' : '' }}>Activated</option>
            </select>

            <!--  -->
            <button name="submit" class="text-white bg-green-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

         </div>

      </form>

   </section>
   @endif
 <!----- MARQUEE ----->

 <!----- FAQ ----->
   @if($triggerBlock == 'faq')
   <section id="faqBlock" class="p-4">
      <form action="{{ route('faqUpdate', $faq->id) }}" method="POST">
         @csrf
         <div class="w-full flex items-center gap-4 text-orange-500">

            <!-- faq title -->
            <textarea type="text" name="title" id="text" rows="6" class="w-100" required>{{ $faq->title }}</textarea>

            <!-- faq-content -->
            <textarea type="text" name="content" id="text" rows="6" class="w-100" required>{{ $faq->content }}</textarea>
            
            <!-- status -->
            <select name="status" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <option value="" class="text-black" disabled>Status</option>
               <option value="0" {{ $faq->status == 0 ? 'selected' : '' }}>Disabled</option>
               <option value="1" {{ $faq->status == 1 ? 'selected' : '' }}>Activated</option>
            </select>

            <!--  -->
            <button name="submit" class="saveButton">Save</button>

         </div>

      </form>
   </section>
   @endif
 <!----- FAQ ----->
 



</x-master>
<!-- ----------- -->