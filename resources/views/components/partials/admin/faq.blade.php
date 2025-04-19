<div id="adminFAQ" class="mt-16">

   <h3>FAQ Control</h3>

   <form action="{{ route('faqCreate') }}" method="POST">
      @csrf
      <div class="w-full flex items-center gap-4 text-orange-500">

         <!-- faq title -->
         <input type="text" name="title" id="text" class="w-100" placeholder="Write FAQ title" required />

         <!-- faq-content -->
         <input type="text" name="content" id="text" class="w-100" placeholder="Write FAQ content" required />
         <!-- status -->
         <select name="status" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <option value="" class="text-black" disabled>Status</option>
            <option value="0">Disable</option>
            <option value="1" selected>Activate</option>
         </select>

         <!--  -->
         <button name="submit" class="saveButton">Save</button>

      </div>

   </form>

</div>
<!-- ----------- -->
<div class="mt-4 mb-16 relative overflow-x-auto shadow-md sm:rounded-lg">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
         <tr class="w-full grid grid-cols-12">
            <th scope="col" class="col-span-3 px-6 py-3">
               FAQ Titles
            </th>
            <th scope="col" class="col-span-6 px-6 py-3 text-left">
               Contents
            </th>
            <th scope="col" class="col-span-1 px-6 py-3 text-center">
               Status
            </th>
            <th scope="col" class="col-span-2 px-6 py-3 text-center">
               Action
            </th>
         </tr>
      </thead>
      <tbody>
         @foreach($faqData as $faq)
         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 grid grid-cols-12">

            <td scope="row" class="col-span-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white overflow-hidden">
               {{ Str::limit($faq->title, 50) . '...' }}
            </td>
            <td scope="row" class="col-span-6 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white overflow-hidden">
               {{ Str::limit($faq->content, 100) . '...' }}
            </td>
            <td class="col-span-1 px-6 py-4 text-center">
               @if ($faq->status == 1)
                  <span class="text-green-500">Selected</span>
               @else
                  <span class="text-orange-500">Disabled</span>
               @endif
            </td>
            <td class="col-span-2 px-6 py-4 flex justify-around">
               <a href="{{ route('faqEdit', $faq->id) }}" class="actionButton bg-green-600 hover:bg-green-800">Edit</a>
               <a href="{{ route('faqDelete', $faq->id) }}" onclick="return confirm('Are you sure you want to delete this Faq content?')" class="actionButton bg-red-600 hover:bg-red-800">Delete</a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
<!-- ----------- -->