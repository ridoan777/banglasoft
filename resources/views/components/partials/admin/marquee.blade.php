<div id="adminMarquee">

   <h3>Marquee Control</h3>
   <form action="{{ route('marqueeCreate') }}" method="POST">
      @csrf
      <div class="w-full flex items-center gap-4 text-orange-500">

         <input type="text" name="content" id="text" class="w-100" placeholder="Write marquee message" required />

         <!-- bg-color -->
         <select name="bg_color" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <option value="" class="bg-black" disabled>Background</option>
            <option value="bg-gray-500">Dark (#6b7280)</option>
            <option value="bg-black">Black</option>
            <option value="bg-white" selected>White</option>
            <option value="bg-blue-500">Blue (#3b82f6)</option>
            <option value="bg-green-500">Green (#10b981)</option>
            <option value="bg-orange-500">Orange (#dd6b20)</option>
         </select>

         <!-- color -->
         <select name="color" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <option value="" class="text-black" disabled>Font Color</option>
            <option value="text-gray-500">Dark (#6b7280)</option>
            <option value="text-black">Black</option>
            <option value="text-white" selected>White</option>
            <option value="text-blue-500">Blue (#3b82f6)</option>
            <option value="text-green-500">Green (#10b981)</option>
            <option value="text-orange-500">Orange (#dd6b20)</option>
         </select>

         <!-- font-size -->
         <select name="font_size" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <option value="" class="text-black" disabled>Font Size</option>
            <option value="text-sm">14px</option>
            <option value="text-base" selected>16px</option>
            <option value="text-lg">18px</option>
            <option value="text-xl">20px</option>
            <option value="text-2xl">24px</option>
            <option value="text-3xl">30px</option>
         </select>

         <!-- status -->
         <select name="status" class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <option value="" class="text-black" disabled>Status</option>
            <option value="0">Disabled</option>
            <option value="1" selected>Activated</option>
         </select>

         <!--  -->
         <button name="submit" class="saveButton">Save</button>

      </div>

   </form>

</div>
<!-- ----------- -->
<div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
         <tr class="w-full grid grid-cols-12">
            <th scope="col" class="col-span-3 px-6 py-3">
               Marquee Content
            </th>
            <th scope="col" class="col-span-2 px-6 py-3 text-center">
               Background
            </th>
            <th scope="col" class="col-span-2 px-6 py-3 text-center">
               Color
            </th>
            <th scope="col" class="col-span-2 px-6 py-3 text-center">
               Size
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
         @foreach($marqueeData as $marquee)
         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 grid grid-cols-12">
            <th scope="row" class="col-span-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white overflow-hidden">
               {{ Str::limit($marquee->content, 40) . '...' }}
            </th>
            <td class="col-span-2 px-6 py-4 text-center">
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
               {{ $bgColors[$marquee->{'bg-color'}] ?? $marquee->{'bg-color'} }}
            </td>
            <td class="col-span-2 px-6 py-4 text-center">
            @php
                $fontSizes = [
                    'text-sm' => '14px',
                    'text-base' => '16px',
                    'text-lg' => '18px',
                    'text-xl' => '20px',
                    'text-2xl' => '24px',
                    'text-3xl' => '30px',
                ];
            @endphp
            {{ $fontSizes[$marquee->{'font-size'}] ?? $marquee->{'font-size'} }}
            </td>
            <td class="col-span-2 px-6 py-4 text-center">
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
            {{ $textColors[$marquee->color] ?? $marquee->color }}
            </td>
            <td class="col-span-1 px-6 py-4 text-center">
               @if ($marquee->status == 1)
                  <span class="text-green-500">Selected</span>
               @else
                  <span class="text-orange-500">Disabled</span>
               @endif
            </td>
            <td class="col-span-2 px-6 py-4 flex justify-around">
               <a href="{{ route('marqueeEdit', $marquee->id) }}" class="actionButton bg-green-600 hover:bg-green-800">Edit</a>
               <a href="{{ route('marqueeDelete', $marquee->id) }}" onclick="return confirm('Are you sure you want to delete this marquee?')" class="actionButton bg-red-600 hover:bg-red-800">Delete</a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
<!-- ----------- -->
<style scoped>
   input {
      background-color: #f9fafb;
      border: 1px solid #d1d5db;
      color: #111827;
      font-size: 0.875rem;
      border-radius: 0.5rem;
      padding: 0.625rem;
      display: block;
   }

   input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
   }

   /* Dark mode styles (optional toggle via JS or class on body) */
   body.dark input {
      background-color: #374151;
      border-color: #4b5563;
      color: #ffffff;

      ::placeholder {
         color: #9ca3af;
      }
   }

   body.dark input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
   }

   select option {
      padding: 0;
      background-color: #2563eb;
   }
</style>
<!--  -->
<style id="action_button">
   .actionButton {
      padding: 6px 16px;
      font-weight: 500;
      color: black;
      border-radius: 6px;
      transition: background-color 0.3s ease;
   }
</style>