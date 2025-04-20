<div id="adminDoctor" class="my-16">

   <h3>Doctor List</h3>
   <!-- --------------------- -->
   <div class="mt-4 mb-16 relative overflow-x-auto shadow-md sm:rounded-lg">

      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="w-full grid grid-cols-12">
               <th scope="col" class="col-span-1 px-6 py-3">
                  SN
               </th>
               <th scope="col" class="col-span-1 px-6 py-3 text-left">
                  Image
               </th>
               <th scope="col" class="col-span-2 px-6 py-3 text-center">
                  Name
               </th>
               <th scope="col" class="col-span-2 px-6 py-3 text-center">
                  Degree
               </th>
               <th scope="col" class="col-span-1 px-6 py-3 text-center">
                  Time
               </th>
               <th scope="col" class="col-span-2 px-6 py-3 text-center">
                  Location
               </th>
               <th scope="col" class="col-span-1 px-6 py-3 text-center">
                  Visit
               </th>
               <th scope="col" class="col-span-2 px-6 py-3 text-center">
                  Action
               </th>
            </tr>
         </thead>
         <tbody>
            @foreach($doctorData as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 rounded-lg grid grid-cols-12">

               <td class="col-span-1 px-6 py-2 flex items-center text-left text-gray-900 dark:text-white overflow-hidden">
                  {{ $index + 1 }}
               </td>
               <!--  -->
               <td scope="row" class="col-span-1 px-6 py-2 flex items-center text-center text-gray-900 dark:text-white overflow-hidden">
                  <img src="{{ asset($item->image) }}" class="h-8 w-8" alt="slider-{{ $index }}">
               </td>
               <!--  -->
               <td scope="row" class="col-span-2 px-6 py-2 flex items-center text-center text-gray-900 dark:text-white overflow-hidden">
                  {{ $item->name }}
               </td>
               <!--  -->
               <td scope="row" class="col-span-2 px-6 py-2 flex items-center text-center text-gray-500 dark:text-white overflow-hidden">
                  {{ Str::limit($item->degree_1, 10) }}, {{ Str::limit($item->college_1, 20) }} <br>
                  {{ Str::limit($item->degree_2, 10) }}, {{ Str::limit($item->college_2, 20) }}
               </td>
               <!--  -->
               <td scope="row" class="col-span-1 px-2 py-2 flex items-center text-center font-wrap text-gray-900 dark:text-white overflow-hidden">
                  {{ $item->time }} <br>
               </td>
               <!--  -->
               <td scope="row" class="col-span-2 px-4 py-2 flex items-center text-center text-gray-900 dark:text-white overflow-hidden">
                  {{ Str::limit($item->chamber, 50) }}
               </td>
               <!--  -->
               <td scope="row" class="col-span-1 px-6 py-2 flex items-center text-center text-gray-900 dark:text-white overflow-hidden">
                  {{ $item->fee }} Tk
               </td>
               <!--  -->
               <td class="col-span-2 px-6 py-2 text-center flex justify-around">
                  <div class="flex justify-around items-center space-x-4">

                     <a href="{{ route('doctorEdit', $item->id) }}" class="actionButton bg-green-600 hover:bg-green-800">Edit</a>
                     <!--  -->
                     <a href="{{ route('doctorDelete', $item->id) }}" onclick="return confirm('Are you sure you want to delete this slider?')" class="actionButton bg-red-600 hover:bg-red-800">Delete</a>

                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>

</div>