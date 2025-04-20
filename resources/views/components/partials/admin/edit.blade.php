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

 <!----- DOCTOR ----->
  @if($triggerBlock == 'doctor')
  <section id="doctorBlock" class="p-4 mb-20">

      <form action="{{ route('doctorUpdate', $doctor->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="w-full flex flex-col gap-4 text-orange-500">

            <!-- name -->
            <div class="flex items-center">
               <label for="name" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Doctor's Name : 
               </label>
               <input type="text" name="name" id="name" class="flex-1 ml-2 w-full" value="{{ $doctor->name }}" required />
            </div>

            <!-- contact -->
            <div class="flex items-center">
               <label for="email" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Email : 
               </label>
               <input type="email" name="email" id="email" class="flex-1 ml-2" value="{{ $doctor->email }}" required />
               <!---->
               <label for="phone" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Phone : 
               </label>
               <input type="phone" name="phone" id="phone" class="flex-1 ml-2" value="{{ $doctor->phone }}" required />
            </div>

            <!-- registration -->
            <div class="flex items-center">
               <label for="reg" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Your MRN/BMDC Registration No. : 
               </label>
               <input type="text" name="reg" id="reg" class="flex-1 ml-2 w-full" value="{{ $doctor->reg }}" required />
            </div>

            <!-- degree-1 -->
            <div class="flex items-center">
               <label for="degree_1" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Degree [1]: 
               </label>
               <input type="text" name="degree_1" id="degree_1" class="flex-1 ml-2" value="{{ $doctor->degree_1 }}" required />
               <!---->
               <label for="college_1" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Institution : 
               </label>
               <input type="text" name="college_1" id="college_1" class="flex-1 ml-2" value="{{ $doctor->college_1 }}" />
            </div>

            <!-- degree-2 -->
            <div class="flex items-center">
               <label for="degree_2" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Degree [2]: 
               </label>
               <input type="text" name="degree_2" id="degree_2" class="flex-1 ml-2" value="{{ $doctor->degree_2 }}" />
               <!---->
               <label for="college_2" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Institution : 
               </label>
               <input type="text" name="college_2" id="college_2" class="flex-1 ml-2" value="{{ $doctor->college_2 }}" />
            </div>

            <!-- details -->
            <div class="flex items-center">
               <label for="visit_time" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Visit Time : 
               </label>
               <input type="text" name="time" id="visit_time" class="flex-1 ml-2" value="{{ $doctor->time }}" />
               <!---->
               <label for="chamber" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Chamber Location : 
               </label>
               <input type="text" name="chamber" id="chamber" class="flex-1 ml-2" value="{{ $doctor->chamber}}" />
               <!---->
               <label for="fee" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Visiting Fee : 
               </label>
               <input type="number" name="fee" id="fee" class="flex-1 ml-2" value="{{ $doctor->fee }}" />
            </div>

            <!-- Image -->
            <div class="max-w-1/2 flex items-center gap-8">
               <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name }}" class="object-cover">
               <!--  -->
               <div class="">
                  <div class="flex items-center">
                     <label for="image" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                        Your Image : 
                     </label>
                     <input class="flex-1 ml-2" id="image" type="file" name="image">
                  </div>
                  <!--  -->
                  <button name="submit" class="my-4 saveButton">Save</button>
               </div>
               <!--  -->
               
            </div>

         </div>

         <!--  -->

      </form>

  </section>
 @endif
 <!----- DOCTOR ----->
 



</x-master>
<!-- ----------- -->