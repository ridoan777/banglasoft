<div id="adminCarousel" class="my-16">

   <h3>Carousel Control</h3>
   <!--  -->
   <form action="{{ route('carouselCreate') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload carousel file</label>

      <div class="px-2 flex space-x-4">
         <input class="block w-full" id="multiple_files" type="file" name="slider_img">

         <!-- status -->
         <select name="status" class="statusSelect">
            <option value="" class="text-black" disabled>Status</option>
            <option value="0">Disable</option>
            <option value="1" selected>Activate</option>
         </select>

         <button type="submit" class="saveButton">Save</button>
      </div>

   </form>
   <!-- --------------------- -->
   <div class="mt-4 mb-16 relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="w-full grid grid-cols-12">
               <th scope="col" class="col-span-2 px-6 py-3">
                  Preview
               </th>
               <th scope="col" class="col-span-6 px-6 py-3 text-left">
                  Titles
               </th>
               <th scope="col" class="col-span-2 px-6 py-3 text-center">
                  Status
               </th>
               <th scope="col" class="col-span-2 px-6 py-3 text-center">
                  Action
               </th>
            </tr>
         </thead>
         <tbody>
            @foreach($carouselData as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 grid grid-cols-12">

               <td scope="row" class="col-span-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white overflow-hidden">
                  <img src="{{ asset($item->slider_img) }}" class="h-8 w-16" alt="slider-{{ $index }}">
               </td>
               <td scope="row" class="col-span-6 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white overflow-hidden">
                  {{ Str::limit($item->slider_img, 100) }}
               </td>
               <td class="col-span-2 px-6 py-4 text-center">
                  @if ($item->status == 1)
                     <span class="text-green-500">Selected</span>
                  @else
                     <span class="text-orange-500">Disabled</span>
                  @endif
               </td>
               <td class="col-span-2 px-6 py-4 flex justify-around">
                  <a href="{{ route('carouselEdit', $item->id) }}" class="actionButton bg-green-600 hover:bg-green-800">Edit</a>
                  <a href="{{ route('carouselDelete', $item->id) }}" onclick="return confirm('Are you sure you want to delete this slider?')" class="actionButton bg-red-600 hover:bg-red-800">Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>


</div>